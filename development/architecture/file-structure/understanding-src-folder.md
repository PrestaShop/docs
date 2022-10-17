---
title: Understanding the "src" folder
weight: 30
---

# Understanding the "src" folder

In the `/src` folder you'll find 3 main folders with different purposes:

- **Core**: contains business logic classes
- **Adapter**: business logic classes that still depend on legacy framework (for instance: `Context`, `Dispatcher` or constants);
- **PrestaShopBundle**: classes that acts as a glue between PrestaShop classes and Symfony

## Core

Core classes belong to the `PrestaShop\PrestaShop\Core` namespace.

This is the default destination for any new code, as long as it follows these rules:

1. It MUST NOT depend on any legacy classes like `Context`, `Dispatcher`, etc.
2. It MUST NOT depend on legacy constants.
3. It MUST NOT depend on classes from PrestaShopBundle.
4. It SHOULD follow SOLID principles, in particular the Dependency Inversion principle.
5. It SHOULD NOT depend directly on the Symfony framework.
6. It SHOULD NOT depend directly on Adapter classes (it SHOULD depend on interfaces instead).
7. New interfaces MUST be added in Core, unless they depend on legacy code.

## Adapter

Adapter classes belong to the `PrestaShop\PrestaShop\Adapter` namespace.

Since Core code cannot depend directly on legacy classes, classes in the Adapter namespace provide Core classes with "bridge" to legacy classes by following the [Adapter pattern strategy](https://en.wikipedia.org/wiki/Adapter_pattern). Through this pattern, Adapter classes wrap legacy code in a way that implements the interface required by Core.

In time, these interfaces will be reimplemented in "pure" Core code, rendering Adapters unnecessary.

Code in this namespace should follow these rules:

1. It MUST NOT depend on classes from PrestaShopBundle.
2. It SHOULD implement a Core interface.
3. It SHOULD only serve as a bridge to a legacy class.
4. It SHOULD follow SOLID principles, in particular the Dependency Inversion principle.
5. It SHOULD NOT be a simple copy/paste of legacy code in a different namespace.

You should create a new file here whenever you have a hard bound with legacy files, and
you can't refactor it easily. For instance, take a look at `PhpParameters` class in "Configuration": this class doesn't rely on
Context or specific constants but on the configuration files of PrestaShop legacy framework. As these files are shared by both front and back, we couldn't manage to refactor it and remove it now.

## PrestaShopBundle

Bundle classes belong to the `PrestaShopBundle` namespace. This folder contains the code composing the application layer, meaning:

- Classes wrapping PrestaShop business logic into a Symfony application
- Classes relying heavily on Symfony such as Controllers, Form Types, etc.

Code in this namespace should follow these rules:

1. It MUST NOT depend on any legacy classes like `Context`, `Dispatcher`, etc.
2. It MUST NOT depend on legacy constants.
2. It SHOULD only serve the purpose of the bundle as a mean to connect Symfony with the Core.

Here are some examples of subsystems belonging to PrestaShopBundle:

- Controllers: The HTTP layer
- Commands: Commands available using "bin/console"
- DataCollector: Specific collectors for the Symfony profiler (eg. hooks)
- Form: Symfony forms and extensions
- Resources: Contains services definition files
- Security: Glue between Security Bundle and PrestaShop authorization/authentication
- Twig: Contains PrestaShop-specific Twig extensions

## Dependency rules

Here's a recap for the dependency rules.

Subsystem | Namespace | Can use Core | Can use Adapter | Can use Legacy
--- | --- | :---: | :---: | :---:
Core | `PrestaShop\PrestaShop\Core` | Yes | No [^1] | No 
Adapter | `PrestaShop\PrestaShop\Adapter` | Yes | Yes | Yes
PrestaShopBundle | `PrestaShopBundle` | Yes | Yes | No
Legacy  | (None) | Yes | Yes | Yes

[^1]: Core classes SHOULD NOT depend directly on Adapter classes (they SHOULD depend on interfaces instead).
