---
title: Migration project and strategy
weight: 10
---

# Migration project and strategy

This is a summary of the current Migration Strategy. It provides an overview of our current vision, in the end of this year 2020, of the Symfony Migration project.

## Different kind of pages

Back-Office pages can be classified in four categories:

1. [Configuration / Settings Form pages][form-pages]

These pages allow the user to modify configuration settings in PrestaShop.

2. [Listing pages][grid-pages]

These pages allow the user to browse PrestaShop content using listings. These listings usually provide some actions the user can trigger, such as "enable/disable", "delete", "bulk delete".

3. [Add/Edit Form pages][identifiable-form-pages]

These pages allow the user to create or edit records from PrestaShop data model (example: create/edit customers).

4. Other pages

There are some pages that are unique: Carriers Edit page, Dashboard, Customer Service page ...

Sometimes a page will have mixed content. For example there are pages that provide two listings or one listing and one configuration form.

## Where we started from

In legacy pages, most of the time, these Back-office pages were structured following standard [MVC PrestaShop model][legacy-mvc]:

- smarty templates (View)
- a Controller with sometimes a lot of logic in it (Controller)
- some business logic classes (Model)
- ObjectModel classes with lot of logic in it (Model)

We believe PrestaShop project has grown too big to follow this 3-layers model, rather fitted for small applications. We have chosen to introduce more architecture layers.

## The beginning of the Migration project: Configuration Form

The Migration project started by migrating [Configuration Form pages][form-pages].

The chosen structure to handle such pages was the following:

1. A View layer: Twig template, rendering manually the Symfony form
2. A Controller layer: Symfony Controller empty of business logic (following the ["Thin Controller, Fat Model"][thin-ctrlers] principle), in charge of controlling the View, formatting data, handling security and routing
3. In Model layer: Symfony Form is built and managed by a FormHandler
4. Also part of the Model layer, DataProvider is in charge of data retrieval and saving the data

Since the DataProvider interacts with ObjectModel, it belongs to [Adapter namespace][adapter-namespace].

## Phase 2: listings

For migrating Listing pages, the [Grid component][grid-pages] was built.

The chosen layer structure to handle such pages was the following:

1. View layer: Twig template, using Grid Twig template
2. Symfony Controller layer empty of business logic, in charge of controlling the View, formatting data, handling security and routing
3. In Application layer, we have the Grid component which requires a GridDefinition configures the Grid and a GridFactory to build it
4. Data is provided by a QueryBuilder, able to handle filters for search requests. This is the Model layer.

If the Grid provides some actions, they are handled by dedicated Controller Actions.

### How Grid interacts with the legacy Model

The QueryBuilder ignores ObjectModel and use a Doctrine Connection to query directly the database. So there is no interaction with legacy code.

However the Grid Actions use ObjectModel, for example to enable/disable a Category status. In the beginning we used Adapter classes to handle these, but we could see that once again we were coupling legacy code with migrated code.

This is when we decided to introduce [CQRS][cqrs].

## Phase 3: [CQRS][cqrs]

We wanted to build a strong frontier between migrated code and legacy code. Since re-writing all the code would be too long, we needed to continue relying on the business logic legacy code to power PrestaShop.

We however wanted to interact with it in a way that would allow us, in the future, to easily unplug it and replace it with a new implementation.

So we decided to introduce [CQRS][cqrs] and [a Domain][domain].

CQRS was introduced into PrestaShop architecture in the following manner:

The Application layer (Forms, Controllers, Views ...) dispatches [Queries and Commands][cqrs] to the Domain to be handled, unaware of the inner workings of this domain.

Inside the domain are QueryHandlers and CommandHandlers that handle dispatched Queries and Commands. For now, they do use PrestaShop legacy business logic to handle it. This means classes like ObjectModel, Cart, Product are still being used inside migrated pages.

The communication between the two layers is performed by CommandBus and QueryBus, which carry the Commands and Queries.

Since the Handlers use legacy logic, they belong to the [Adapter namespace][adapter-namespace]. In the future they will be replaced with new implementations. The replacement will be very easy: a new Handler will be plugged in, previous Handler will be removed. No modification will be required in the code.

So the structure for a Grid action, using CQRS, is the following:

1. Symfony Controller layer empty of business logic, in charge of controlling the View, formatting data, handling security and routing
2. The Controller dispatches a Command to perform the action
3. Command goes through the CommandBus and is handled by a Handler
4. Handler, in Domain (= Model layer) performs the business logic needed

So "migrating a Grid action" means to "move the legacy logic into a Handler and building a Symfony layer on top of it"

## Phase 4 : Add/Edit Form pages

These pages are form leveraging the concepts of CQRS.

[You can read more about it by clicking on this link][identifiable-form-pages].

1. View layer: Twig template, rendering manually the Symfony form
2. Symfony Controller layer empty of business logic, in charge of controlling the View, formatting data, handling security and routing
3. Application layer:
- Symfony Form is built by a FormBuilder and managed by a FormHandler
- a FormDataProvider is in charge of data retrieval
- a FormDataHandler is in charge of validating and dispatching a Command to perform the action
4. Domain / Model layer:
- Command goes through the CommandBus and is handled by a Handler
- Handler performs the business logic needed

So "migrating a legacy Add/Edit page" means to "move the legacy logic into a Handler and building a Symfony Form on top of it with its management logic".

## Form Theme

We don't want to render Form inputs manually, so we now rely on a [Twig Form Theme][twig-form-theme] allowing us to render all of our Symfony forms with a single block

```
{{ form_widget(form) }}
```

## Towards a Core domain

Between phase 1 and phase 4, two years passed. Two years where we experimented, explored, struggled and we got the hang of what was needed for PrestaShop to move forward.

We now have a better understanding of what the direction we are aiming for. We now know we want to build a full Core Domain for the future of PrestaShop.

The [future PrestaShop architecture][future-architecture] is based on 5 key elements:

{{< figure src="../../img/architecture-overview-future.jpg" title="Future architecture overview" >}}

1. Core Domain
2. Front-end applications
3. Contracts and Tools (SDKs)
4. APIs
5. Extensions

The **Core** sits in the back-end and is at the center of it all. It accounts for all the business needs and use cases that PrestaShop is capable of doing (managing products, shopping carts, orders, etc.). The Core is _domain-oriented_, meaning that it is built around business use cases, expressed in an [ubiquitous language][ubiquitous-langage]. The Core is also master of its own Domain; in  order to let it be the guardian of system-wide coherence, it has to be isolated from other services and be the only one capable of performing state transitions. Other services can only interact with the Core through well-defined interfaces, that we call the Core API. Incidentally, this also means that Core behavior can be _extended_, not _modified_, by other services or at least not in a way that it puts system coherence at risk. In addition, the Core is designed to be easily testable and is covered by automated tests.

In the future architecture, the Back Office (BO) and the Front Office (FO) are independent **front-end applications**, each one running entirely on the browser. They are fully component-based (our framework of choice is [VueJs][vue-js], and built using separate toolsets called **Software Development Kits** (SDKs): one for the FO, one for the BO. These SDKs would not only include reusable components, but also bidirectional communication channels based on stable **contracts**, both within the front-end application (events) as well as with the back-end (through APIs). The BO SDK also integrates the UI Kit, which provides an uniform style for the whole Back Office.

The Core and FO/BO applications communicate through **two separate APIs**, namely the FO API and the BO API. These APIs serve two distinct purposes: while the FO API is public and designed to serve customer-facing applications (e.g. the FO application, but also other custom clients, like mobile apps or Point of Sales in physical stores), the BO API is protected by access rights (much like the current Web services) and is meant to power the BO application, as well as third party integrations like ERPs. In order to maximize forward compatibility, APIs and SDKs are versioned.

Of course, the future architecture supports **Extensions**, which can be placed all over the system. Modules can hook on to existing features or add new ones, either on the front-end applications as well as in the back-end (for data processing). On the front-end, Modules are based on the FO/BO SDKs, whereas server-side they are built on top of the Back-end SDK. While Front-end SDKs allow Modules to interact with front-end applications and retrieve data through PrestaShop's APIs, the Back-end SDK provides access to the Core API, which allows Modules to query data directly from the Core, perform state transitions, extend existing API endpoints and even create new ones. In order to ensure system stability, Extensions can _only_ interact with PrestaShop through APIs and SDKs.

Finally, Themes are a particular kind of extension that sits on top of the front-end application and that defines the _layout_ and _style_ for components provided by the application, FO SDK, and any installed Modules.

### Migration as an introduction to the Core

Our Handlers started as "place where we put the legacy code we dont have the time to migrate now". They must now become interfaces for the Core domain, defining the future API endpoints. You could think of them as Controllers for the Domain, and consequently they will become empty of business logic, only focused on validating incoming Commands and Queries and formatting the data in both directions.

[form-pages]: {{< ref "/8/development/architecture/migration-guide/forms/settings-forms.md" >}}
[grid-pages]: {{< ref "/8/development/components/grid/" >}}
[identifiable-form-pages]: {{< ref "/8/development/architecture/migration-guide/forms/crud-forms.md" >}}
[legacy-mvc]: {{< ref "/8/basics/introduction.md" >}}
[thin-ctrlers]: https://symfony.com/doc/4.0/best_practices/controllers.html
[adapter-namespace]: {{< ref "/8/development/architecture/file-structure/understanding-src-folder.md" >}}
[cqrs]: {{< ref "/8/development/architecture/domain/cqrs.md" >}}
[domain]: https://en.wikipedia.org/wiki/Domain-driven_design
[future-architecture]: https://build.prestashop-project.org/news/prestashop-in-2019-and-beyond-part-3-the-future-architecture/#our-proposal-for-a-future-architecture
[ubiquitous-langage]: https://enterprisecraftsmanship.com/posts/ubiquitous-language-naming/
[vue-js]: https://vuejs.org/
[twig-form-theme]: {{< ref "/8/development/components/form/form-theme/" >}}

