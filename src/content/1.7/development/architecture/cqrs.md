---
title: CQRS
weight: 10
---

# CQRS

## What is CQRS?

CQRS stands for _Command Query Responsibility Segregation_. In brief, the CQRS pattern suggests to separate "write" and "read" models, which it refers to as Commands and Queries.

## Why using CQRS in PrestaShop?

During Back Office migration to Symfony, PrestaShop needs a way to access and alter data on the new Symfony pages without multiplying the sources of truth, and without accessing `ObjectModel` (e.g. `Product`, `Category`) directly.

Commands and Queries allow us to isolate the controllers from the data source, which can be later replaced by something else while leaving behind a nice API.

This implementation proposes a "top-down" design, which inverses the classic data-driven design. It starts on a page and the actions performed in it, and then trickles down layer by layer, finishing on the data layer.

## CQRS Principles in PrestaShop

1. All input validation SHOULD be done during the object construction.
2. All objects SHOULD be immutable unless it's impractical to do so.
3. The `Core\Domain` namespace _describes_ business objects, actions and messages. It DOES NOT contain behavior (at least for now).

### Command and CommandHandler principles

1. Any alteration on the state of the application MUST be performed through a `Command`.
2. `Command` describes a __single__ action. It DOES NOT perform it.
3. `Command` receives only scalar/native types on input.
4. For every `Command` there is at least one `CommandHandler` whose role is to execute that `Command`.
5. `CommandHandler` MUST be placed in the `Adapter` namespace as long as they have legacy dependencies.
6. `CommandHandler` SHOULD NOT return anything on success, and SHOULD throw a typed `Exception` on failure. The "no return on success" rule can be broken only when creating entities. 
7. `CommandHandler` MUST use the existing `ObjectModel` for writes as long as those classes exist.
8. `CommandHandler` MUST implement an interface containing a single public method like this: 

```php
public function handle(NameOfTheCommand $command);
```

### Query and QueryHandler principles

1. Data retrieval SHOULD always go through a `Query`.
2. `Query` describes a _single_ data query. It DOES NOT perform it.
3. `Query` receives only scalar/native types on input.
4. For every `Query` there is at least one `QueryHandler` whose role is to execute that `Query` and return the resulting data set.
5. `QueryHandler` SHOULD return a typed object, and SHOULD throw a typed `Exception` on failure.
6. `QueryHandler` SHOULD use the existing `ObjectModel` for reads as long as it's reasonable to do so (in particular for CUD operations in BO migration).
7. `QueryHandler` MUST be placed in the `Adapter` namespace as long as they have legacy dependencies.
8. `QueryHandler` SHOULD return data objects that make sense to the domain, and SHOULD NOT leak internal objects.
9. `QueryHandler` MUST implement an interface containing a single public method and a typed return like this: 

```php
/**
 * @param NameOfTheQuery $query
 *
 * @return TypeOfReturn
 */
public function handle(NameOfTheQuery $query);
```

## Command and Query buses

Command bus is a pattern used to map `Commands` and `Queries` to `CommandHandlers` and `QueryHandlers`. PrestaShop defines it's own `CommandBusInterface` and implements it using [Tactician command bus library](https://tactician.thephpleague.com/).

PrestaShop uses 2 commands buses:

1. `CommandBus` - for dispatching `Commnads` only
2. `QueryBus` - for dispatching `Queries` only
