---
title: Domain services
weight: 20
---

# Domain services

As mentioned in [CQRS principles](cqrs.md), a single command is just a port, a representation of a single use case, therefore the command handler should not contain any domain logic by itself, but should be orchestrating other services to fulfill the use case instead.
These services are responsible for logic such as:
1. Persisting the entities (a.k.a ObjectModel in current prestashop architecture) data into database
2. Validating the entities
3. Performing various modifications of related data structures etc.

Here are couple principles of the domain services: 
1. It MUST use the existing `ObjectModel` for writes as long as those classes exist.
2. If it uses any legacy service or object model it MUST stay in adapter namespace.
2. If it uses any `ObjectModel` method related to data persistence, that method MUST BE wrapped into a dedicated repository class using the [AbstractObjectModelRepository](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/AbstractObjectModelRepository.php) and validated by dedicated validator using the [AbstractObjectModelValidator](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/AbstractObjectModelValidator.php)

# Code examples

## ObjectModel Repositories

1. [ProductRepository](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/Repository/ProductRepository.php)
2. [ProductSupplierRepository](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/Repository/ProductSupplierRepository.php)
3. [VirtualProductFileRepository](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/VirtualProduct/Repository/VirtualProductFileRepository.php)
4. [SpecificPriceRepository](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/SpecificPrice/Repository/SpecificPriceRepository.php)
   
## ObjectModel Validators
1. [ProductRepository](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/Validate/ProductValidator.php)
2. [ProductSupplierValidator](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/Validate/ProductSupplierValidator.php)
2. [VirtualProductFileValidator](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/VirtualProduct/Validate/VirtualProductFileValidator.php)
3. [SpecificPriceValidator](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/SpecificPrice/Validate/SpecificPriceValidator.php)

## Product domain services
1. [Product update services](https://github.com/PrestaShop/PrestaShop/tree/develop/src/Adapter/Product/Update)
2. [Virtual product update services](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/VirtualProduct/Update)
2. [Combination update services](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/Combination/Update)
2. [Combination create services](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/Product/Combination/Create)

## Service usage in commandHandler examples
1. [Combination command handlers](https://github.com/PrestaShop/PrestaShop/tree/develop/src/Adapter/Product/Combination/CommandHandler)
2. [Virtual product command handlers](https://github.com/PrestaShop/PrestaShop/tree/develop/src/Adapter/Product/VirtualProduct/CommandHandler)
2. [Product stock command handlers](https://github.com/PrestaShop/PrestaShop/tree/develop/src/Adapter/Product/Stock/CommandHandler)
