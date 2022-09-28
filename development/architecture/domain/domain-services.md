---
title: Domain services
weight: 10
---

# Domain services

As mentioned in [CQRS principles]({{< relref "./cqrs" >}}), a `Command` is a representation of a single domain use case. To prevent `Command Handlers` from duplicating code and depending on each other, it is usually best to **avoid implementing the actual logic in the `Command Handler`** itself, and delegate it to `Domain Services` instead. These services are responsible for logic such as:

1. Persisting the entities (a.k.a. ObjectModel in current prestashop architecture) data into database
2. Validating the entities
3. Performing various modifications of related data structures etc.

Here are some principles for implementing a Domain Service:

1. It MUST use the existing `ObjectModel` for writes, as long as such class exists.
2. If it uses any legacy service or object model, then it MUST be placed in the `Adapter` namespace.
3. If it needs to perform a sql query and related `ObjectModel` exists, then this query MUST be delegated to the appropriate repository class which must ensure that no legacy exceptions are thrown. If the related `ObjectModel` already implements such method, then the repository must delegate its implementation to the `ObjectModel`.
{{% notice %}}
   Some reusable methods are present in [AbstractObjectModelRepository](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Repository/AbstractObjectModelRepository.php).
{{% /notice %}}
4. If `ObjectModel` contains fields validation, it MUST be validated by a dedicated validator class before persisting to database (e.g. when using `add`/`update`/`save` methods). It ensures that legacy [PrestashopException](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/exception/PrestaShopException.php) is not bubbling up and each validation error can be identified by a dedicated exception or exception code.
{{% notice %}}
   Some reusable methods are present in [AbstractObjectModelValidator](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/AbstractObjectModelValidator.php).
{{% /notice %}}

# Code examples

## `ObjectModel` repositories

1. [ProductRepository](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/Repository/ProductRepository.php)
2. [ProductSupplierRepository](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/Repository/ProductSupplierRepository.php)
3. [VirtualProductFileRepository](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/VirtualProduct/Repository/VirtualProductFileRepository.php)
4. [SpecificPriceRepository](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/SpecificPrice/Repository/SpecificPriceRepository.php)

## `ObjectModel` validators

1. [ProductValidator](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/Validate/ProductValidator.php)
2. [ProductSupplierValidator](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/Validate/ProductSupplierValidator.php)
2. [VirtualProductFileValidator](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/VirtualProduct/Validate/VirtualProductFileValidator.php)
3. [SpecificPriceValidator](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/SpecificPrice/Validate/SpecificPriceValidator.php)

## Product domain services

1. [Product update services](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/src/Adapter/Product/Update)
2. [Virtual product update services](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/src/Adapter/Product/VirtualProduct/Update)
2. [Combination update services](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/src/Adapter/Product/Combination/Update)
2. [Combination create services](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/src/Adapter/Product/Combination/Create)

## Service usage in `CommandHandler` examples

1. [Combination command handlers](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/src/Adapter/Product/Combination/CommandHandler)
2. [Virtual product command handlers](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/src/Adapter/Product/VirtualProduct/CommandHandler)
2. [Product stock command handlers](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/src/Adapter/Product/Stock/CommandHandler)
