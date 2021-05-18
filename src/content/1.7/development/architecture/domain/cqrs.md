---
title: CQRS - Commands and Queries
menuTitle: CQRS
weight: 10
aliases:
- 1.7/development/architecture/cqrs/
---

# CQRS - Commands and Queries

## What is CQRS?

CQRS stands for _Command Query Responsibility Segregation_. In brief, the CQRS pattern suggests to separate "write" and "read" models, which it refers to as Commands and Queries. In a web application like a CMS, we perform either "read" operations which return information to the user or "write" operations which modify the data managed by the application.

## Why using CQRS in PrestaShop?

During Back Office migration to Symfony, PrestaShop needs a way to access and alter data on the new Symfony pages without multiplying the sources of truth, and without accessing `ObjectModel` (e.g. `Product`, `Category`) directly.

Commands and Queries allow us to isolate the controllers from the data source, which can be later replaced by something else while leaving behind a nice API.

This implementation proposes a "top-down" design, which inverses the classic data-driven design. It starts on a page and the actions performed in it, and then trickles down layer by layer, finishing on the data layer.

## Difference between legacy & new architectures

In legacy architecture, controller is calling `ObjectModel` directly, without providing clear API or separation between read and write model, thus highly coupling data layer with controller. See legacy architecture's schema below.

{{< figure src="../img/legacy_architecture.png" title="Legacy architecture" >}}

Fortunately, by implementing CQRS it allows PrestaShop to quickly build new API, but still use legacy `ObjectModel` by implementing `Adapter` handlers. This approach enables us to drop `ObjectModel` and replace it with something else later without breaking new API (Commands & Queries). See new architecture's schema below:

{{< figure src="../img/new_architecture.png" title="New architecture using CQRS" >}}

## CQRS Principles in PrestaShop

1. All input validation SHOULD be done during the object construction (see [Validation]({{< relref "/1.7/development/architecture/migration-guide/validation">}})).
2. All objects SHOULD be immutable unless it's impractical to do so.
3. The `Core\Domain` namespace _describes_ business objects, actions and messages. It DOES NOT contain behavior (at least for now).

### Command and CommandHandler principles

1. Any alteration on the state of the application MUST be performed through a `Command`.
2. A `Command` describes a __single__ action. It DOES NOT perform it.
3. A `Command` receives only primitive types on input (int, float, string, bool and array).
4. For every `Command` there MUST be at least one `CommandHandler` whose role is to execute that `Command`.
5. A `CommandHandler` acts as a port to a Core, therefore it SHOULD NOT handle the domain logic itself, but orchestrate the necessary [services]({{< relref "./domain-services" >}}) instead.
6. A `CommandHandler` MUST be placed in the `Adapter` namespace as long as it has legacy dependencies.
7. A `CommandHandler` SHOULD NOT return anything on success, and SHOULD throw a typed `Exception` on failure. The "no return on success" rule can be broken only when creating entities.
8. A `CommandHandler` MUST implement an interface containing a single public method like this:

```php
<?php
public function handle(NameOfTheCommand $command);
```

### Query and QueryHandler principles

1. Data retrieval SHOULD always go through a `Query`.
2. A `Query` describes a **single** data query. It DOES NOT perform it.
3. A `Query` receives only primitive types on input (int, float, string, bool and array).
4. For every `Query` there MUST be at least one `QueryHandler` whose role is to execute that `Query` and return the resulting data set.
5. A `QueryHandler` SHOULD return a typed object, and SHOULD throw a typed `Exception` on failure.
6. A `QueryHandler` SHOULD use the existing `ObjectModel` for reads as long as it's reasonable to do so (in particular for CUD operations in BO migration).
7. A `QueryHandler` MUST be placed in the `Adapter` namespace as long as they have legacy dependencies.
8. A `QueryHandler` SHOULD return data objects that make sense to the domain, and SHOULD NOT leak internal objects.
9. A `QueryHandler` MUST implement an interface containing a single public method and a typed return like this: 

```php
<?php
/**
 * @param NameOfTheQuery $query
 *
 * @return TypeOfReturn
 */
public function handle(NameOfTheQuery $query): TypeOfReturn;
```

## Command and Query buses

Command bus is a pattern used to map `Commands` and `Queries` to `CommandHandlers` and `QueryHandlers`. PrestaShop defines it's own `CommandBusInterface` and implements it using [Tactician command bus library](https://tactician.thephpleague.com/).

PrestaShop uses 2 commands buses:

1. `CommandBus` - for dispatching `Commands` only
2. `QueryBus` - for dispatching `Queries` only

### CQRS in Debug Toolbar

To help you understand which command/queries are used on a page and how you can interact with them a profiler has been added in the Symfony debug toolbar.

{{< figure src="../img/cqrs-debug-toolbar.png" title="CQRS Debug Toolbar" >}}

It shows you a quick resume of the CQRS commands/queries used on the page, you can then have more details in the Symfony profiler page:

{{< figure src="../img/cqrs-profiler.png" title="CQRS Profiler" >}}
