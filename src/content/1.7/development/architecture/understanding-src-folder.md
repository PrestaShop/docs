---
title: Understanding the "src" folder
weight: 30
---

# Understanding the "src" folder

The main idea when doing the 1.7 release was to use Symfony as a replacement for our own PrestaShop framework.

In "src" folder you'll find 3 main folders with different purposes:

* **Core**: the refactored classes or business logic extraction for PrestaShop 1.7;
* **Adapter**: the classes that still depends on legacy framework (Context, Dispatcher or constants for instance);
* **PrestaShopBundle**: the classes that acts as a glue between PrestaShop classes and Symfony

## Core

```
.
├── Addon
├── Checkout
├── Cldr
├── CMS
├── Configuration
├── ConfigurationInterface.php
├── ContainerBuilder.php
├── Crypto
├── Email
├── Feature
├── Form
├── Foundation
├── Image
├── Module
├── Payment
├── Product
├── Repository
├── Search
├── Shop
└── Stock
```

You should add/create a file in "Core" namespace if:

* It doesn't rely on Context, Dispatcher, legacy constants, Service Container
* You're adding a new contract (interface)
* This class may be used outside of PrestaShop "CMS" usage

## Adapter

This folder contains all adapters we use for the migration of Back Office, using the [Adapter pattern strategy](https://en.wikipedia.org/wiki/Adapter_pattern). The idea is to avoid to have hard bound between the PrestaShopBundle and the legacy back office, so that the legacy classes can eventually be deleted.

```
.
├── Addons
├── AddressFactory.php
├── Admin
├── Assets
├── Attribute
├── BestSales
├── Cache
├── CacheManager.php
├── Carrier
├── Cart
├── Category
├── ClassLang.php
├── CombinationDataProvider.php
├── Configuration
├── Configuration.php
├── CoreException.php
├── Country
├── Currency
├── Customer
├── Database.php
├── Debug
├── EntityMapper.php
├── EntityMetaDataRetriever.php
├── Feature
├── GeneralConfiguration.php
├── Group
├── Hook
├── HookManager.php
├── Hosting
├── Image
├── ImageManager.php
├── LegacyContext.php
├── LegacyHookSubscriber.php
├── LegacyLogger.php
├── Mail
├── Manufacturer
├── Media
├── Module
├── NewProducts
├── ObjectPresenter.php
├── OptionalFeatures
├── Order
├── Pack
├── PricesDrop
├── Product
├── Requirement
├── Search
├── Security
├── ServiceLocator.php
├── Shop
├── Smarty
├── StockManager.php
├── Supplier
├── SymfonyContainer.php
├── System
├── Tax
├── Tools.php
├── Upload
├── Validate.php
└── Warehouse
```

You should create file here only if you have an hard bound with legacy framework when migrating to Symfony, and
you can't refactor it easily. For instance, take a look at `PhpParameters` class in "Configuration": this class doesn't rely on
Context or specific constants but on the configuration files of PrestaShop legacy framework. As these files are shared by both front and back, we couldn't manage to refactor it and remove it now.

## PrestaShopBundle

The bundle contains the glue between Symfony framework and PrestaShop:

```
.
├── Api
├── Cache
├── Command
├── Component
├── Controller
├── DataCollector
├── DependencyInjection
├── Entity
├── Event
├── EventListener
├── Exception
├── Form
├── Install
├── Kernel
├── Model
├── PrestaShopBundle.php
├── Resources
├── Security
├── Service
├── Translation
├── Twig
└── Utils
```

Regarding the actual tree, we can already see some mistakes. The following folders should be moved to `Core`:

* Api
* Component
* Exception
* Install
* Model
* Service
* Translation
* Utils

An ideal structure for this namespace could be the following:

```
.
├── CacheWarmer // Actions on Symfony cache clear
├── Command // Commands available using "bin/console"
├── Controller // The HTTP layer
├── DataCollector // Specific collectors for PrestaShop in debug toolbar (like hooks)
├── DependencyInjection // Specific compiler passes for PrestaShop
├── Entity // Classes mapped to Doctrine ORM (Lang for instance)
├── EventListener (may contain "Event")
├── Form // Symfony forms and extensions
├── Kernel // Very specific tasks to manage at PrestaShop Application boot
├── PrestaShopBundle.php
├── Resources // Contains services definition and Twig templates
├── Security // Glue between Security Bundle and PrestaShop Autorization/Authentification
└── Twig // Every filter and functions available in PrestaShop back office
```

If you think your new file doesn't belong to one of those folders, you should probably consider adding it to *Core* or *Adapter* folders.
