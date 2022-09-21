---
title: Behat testing
menuTitle: Behat testing
weight: 20
---

# Behat testing

{{% notice tip %}}
It is important that you get familiar with the `Behats` principles before reading further. You can find the official behat documentation [here](https://docs.behat.org/en/latest/guides.html).
{{% /notice %}}

A behaviour (`behat`) tests are a part of integration tests. They allow testing how multiple components are working together. In PrestaShop, behats are used to test the `Application` and `Domain` layer integration - basically all the [CQRS]({{< relref "/8/development/architecture/domain/cqrs.md" >}}) commands and queries.

## Database

### Global dump
During behat tests the actual database queries are executed, therefore before testing you need to run a command `composer create-test-db` to create a test database.

{{% notice %}}
The `create-test-db` script installs a fresh prestashop with fixtures in a new database called `test_{your database name}` and dumps the database in your machine `/tmp` directory named `ps_dump_database_name_8.0.0.sql`. That `ps_dump_database_name_8.0.0.sql` is later used to reset the database. You can check the actual script for more information - [/tests/bin/create-test-db.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/bin/create-test-db.php).
{{% /notice %}}

### Tables dump
During the test database creation a global dump is created, but some dumps for each table are also created, and a checksum of each table is also performed for each table. So for `product` table, for example, you will get two files in your `/tmp` folder:
- `ps_dump_database_name_8.0.0_ps_product.sql`: contains the dump that allows to clean and restore all the data in `product` table
- `ps_dump_database_name_8.0.0_ps_product.md5`: the Checksum value (returned by MySQL function) after the test database has been installed with fixtures data

With those two files it is possible to:
- restore a specific table independently instead of restoring the whole database
- compare the current checksum with the saved one to pre-check if a restore is needed

This allows restoring the DB fixtures more efficiently and more quickly.

### Restore commands
When testing behat scenarios it might be useful to sometimes restore the initial database content (because some scenarios messed with the current content or any other reason).
In those case two composer commands are available:
- `composer restore-test-db`: drop the whole database and restore its whole content with a single dump (safer but longer)
- `composer restore-test-tables`: check for each table if it was modified, when necessary drop the table and restore the table content (faster, recommended)

{{% notice %}}
These composer methods are useful when testing a feature only during development. But in the end each scenario is responsible for setting the database correctly and, most of all, cleaning it after it is over. **ALWAYS leave the database in the state it was previously**.
So each feature must handle database restoration dedicated steps or custom hooks (see below).
{{% /notice %}}

## Behats structure in PrestaShop

Behat related files are located in [tests/Integration/Behaviour/](https://github.com/PrestaShop/PrestaShop/tree/develop/tests/Integration/Behaviour). This directory contains following files:
- [behat.yml]({{< relref "#behatyml">}}) - this is the test suites configuration file which describes feature paths and contexts for every test suite. It can be passed as an argument when running the tests like this `./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml`.
- bootstrap.php - this file loads the `Kernel` for a behat tests environment.
- Features - this directory contains all the [Scenarios](https://github.com/PrestaShop/PrestaShop/tree/develop/tests/Integration/Behaviour/Features/Scenario) and [Contexts](https://github.com/PrestaShop/PrestaShop/tree/develop/tests/Integration/Behaviour/Features/Context). More about it [below]({{< relref "#features" >}}).

## Features

{{% notice tip %}}
Before continuing, **please read the official `behat` documentation** about the [features and scenarios](https://docs.behat.org/en/latest/user_guide/features_scenarios.html).
{{% /notice %}}

In PrestaShop all `*.feature` files are placed in [.tests/Integration/Behaviour/Features/Scenario](https://github.com/PrestaShop/PrestaShop/tree/develop/tests/Integration/Behaviour/Features/Scenario). Each feature is placed in a dedicated directory organized by `domain` (or even a `subdomain` if necessary). These feature files contains text that describes the testing scenarios in a user-friendly manner, each of them must start with a keyword `Feature` and have a one or multiple scenarios starting with a keyword `Scenario`. For example:
```feature
Feature: Update product status from BO (Back Office)
  As an employee I must be able to update product status (enable/disable)

  Scenario: I update standard product status
    Given I add product "product1" with following information:
      | name[en-US] | Values list poster nr. 1 (paper) |
      | type        | standard                         |
    And product product1 type should be standard
    And product "product1" should be disabled
    When I enable product "product1"
    Then product "product1" should be enabled
    When I disable product "product1"
    Then product "product1" should be disabled
```
As you can see, we state the `given` information, then we describe the action and finally the assertion. These scenarios should be easy to understand even for non-technical people. So when writing one, try to avoid the technical keywords and make it as user-friendly as possible.

{{% notice tip %}}
There is also a keyword `Background`, which allows running certain code before each scenario. See more [here](https://docs.behat.org/en/latest/user_guide/writing_scenarios.html#user-guide-writing-scenarios-backgrounds).
{{% /notice %}}

Every line in scenario has a related method defined in a [Context]({{< relref "#context">}}).

## Context

The behat `Context` files are classes that contains the implementations of the features. In PrestaShop all `Context` files are placed in [tests/Integration/Behaviour/Features/Scenario](https://github.com/PrestaShop/PrestaShop/tree/develop/tests/Integration/Behaviour/Features/Context).

{{% notice tip %}}
The most recent `Context` files are located in [`Tests/Integration/Behaviour/Features/Context/Domain`](https://github.com/PrestaShop/PrestaShop/tree/develop/tests/Integration/Behaviour/Features/Context/Domain) namespace, so try to use these and avoid the ones from the `Tests/Integration/Behaviour/Features/Context/*` namespace (those are old and might not be implemented well).
{{% /notice%}}

When creating a new Context class, it should extend the [`AbstractDomainFeatureContext`](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/Integration/Behaviour/Features/Context/Domain/AbstractDomainFeatureContext.php).

{{% notice %}}
The [`AbstractDomainFeatureContext`](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/Integration/Behaviour/Features/Context/Domain/AbstractDomainFeatureContext.php) contains some commonly used helper methods, and it implements the `Behat\Behat\Context` which is necessary for these tests to work.
{{% /notice %}}

This is how the context looks like:
```php
class OrderFeatureContext extends AbstractDomainFeatureContext
{
//    ...
    /**
     * @Given I add order :orderReference with the following details:
     *
     * @param string $orderReference
     * @param TableNode $table
     */
    public function addOrderWithTheFollowingDetails(string $orderReference, TableNode $table)
    {
        $testCaseData = $table->getRowsHash();

        $data = $this->mapAddOrderFromBackOfficeData($testCaseData);

        /** @var OrderId $orderId */
        $orderId = $this->getCommandBus()->handle(
            new AddOrderFromBackOfficeCommand(
                $data['cartId'],
                $data['employeeId'],
                $data['orderMessage'],
                $data['paymentModuleName'],
                $data['orderStateId']
            )
        );

        SharedStorage::getStorage()->set($orderReference, $orderId->getValue());
    }
    
//    ...

```

As you can see in example, the string `@Given I add order :orderReference with the following details:` maps this method to related line in `*.feature` file. The `:orderReference` acts as a variable which actually is the `id` of the order, that is saved into the [`SharedStorage`]({{< relref "#shared-storage" >}}). The `TableNode $table` is a specific argument, you can read about it [here](https://behat.org/en/latest/user_guide/writing_scenarios.html#tables).

## Shared storage

The [SharedStorage](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/Integration/Behaviour/Features/Context/SharedStorage.php) is responsible for holding certain values in memory which are shared across the feature. The most common usage example is the `id` reference - we specify a certain keyword e.g. `product1` before creating it, and once the command returns the auto-incremented value, we set it in shared storage like this `SharedStorage::getStorage()->set($orderReference, $orderId->getValue());`. In upcoming scenarios we can reuse this reference to get the record, something like this:
```php
    protected function getProductForEditing(string $reference): ProductForEditing
    {
        $productId = $this->getSharedStorage()->get($reference);

        return $this->getQueryBus()->handle(new GetProductForEditing(
            $productId
        ));
    }
```

## Hooks

Behats allow you to use [hooks](https://docs.behat.org/en/v2.5/guides/3.hooks.html#hooks). You can find some usages in [CommonFeatureContext](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/Integration/Behaviour/Features/Context/CommonFeatureContext.php). You can use these hooked methods by tagging them before the `Feature` (or before `Scenario` depending on the hook type), like this ([add_product.feature](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/Integration/Behaviour/Features/Context/Domain/Product/AddProductFeatureContext.php)
):

```feature
@clear-cache-before-feature
@clear-cache-after-feature
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO

```

{{% notice tip %}}
You can also tag specific `features` if you want to run only them with a `--tags` filter. For example, if you add following tag in your Feature:
```feature
@add
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO
    ...
```
Then you can run only this feature by following command `./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml -s product --tags add`

{{% /notice %}}

## Restore and clear

Each feature is responsible for handling its own data and the database state, on startup you should assume that the database is in the same state as when it was created with fixtures.
To assume that you need to take responsibility for cleaning it after the feature or the suite is over. There are several ways of restoring/cleaning the database.
Sometimes clearing the cache of the software is also needed since all the behat suites are run in a single process.

### Restore step by step

```feature
@add
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO

  Scenario: I modify stuff in product tables I clean them afterwards
     ...
     # You don't need to specify the database prefix, tables are separated by a comma
     Then I restore tables "product,product_attributes"
```

```php
// Class Tests\Integration\Behaviour\Features\Context\CommonFeatureContext
class CommonFeatureContext extends AbstractPrestaShopFeatureContext {
    /**
     * @Given I restore tables :tableNames
     *
     * @param string $tableNames
     */
    public function restoreTables(string $tableNames): void
    {
        $tables = explode(',', $tableNames);
        DatabaseDump::restoreTables($tables);
    }
}
```

### Restore all tables with generic tag

```feature
@restore-all-tables-before-feature
@add
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO
```

```php
// Class Tests\Integration\Behaviour\Features\Context\CommonFeatureContext
class CommonFeatureContext extends AbstractPrestaShopFeatureContext {
    /**
     * This hook can be used to flag a feature for database hard reset
     *
     * @BeforeFeature @restore-all-tables-before-feature
     */
    public static function restoreAllTablesBeforeFeature()
    {
        DatabaseDump::restoreAllTables();
        require_once _PS_ROOT_DIR_ . '/config/config.inc.php';
    }
}
```

### Restore a domain with specific tag

```feature
@restore-products-before-feature
@add
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO
```

```php
// Class Tests\Integration\Behaviour\Features\Context\Domain\Product\CommonProductFeatureContext
class CommonProductFeatureContext extends AbstractPrestaShopFeatureContext {
    /**
     * @BeforeFeature @restore-products-before-feature
     */
    public static function restoreProductTablesBeforeFeature(): void
    {
        static::restoreProductTables();
    }

    private static function restoreProductTables(): void
    {
        DatabaseDump::restoreTables([
            'product',
            'product_attachment',
            'product_attribute',
            // And many more but it's not the point here
        ]);
    }
}
```

### Restore a whole suite

This hook is triggered just by associating the context class to your suite (see behat configuration below).

```php
// Class Tests\Integration\Behaviour\Features\Context\Domain\Product\CommonProductFeatureContext
class CommonProductFeatureContext extends AbstractPrestaShopFeatureContext {
    /**
     * @BeforeSuite
     */
    public static function restoreAllTablesBeforeSuite(): void
    {
        DatabaseDump::restoreAllTables();
    }

    /**
     * @AfterSuite
     */
    public static function restoreProductTablesAfterSuite(): void
    {
        static::restoreProductTables();
        LanguageFeatureContext::restoreLanguagesTablesAfterFeature();
    }
}
```

### Clear cache

```feature
@clear-cache-before-feature
@clear-cache-after-feature
@add
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO

  @clear-cache-before-scenario
  Scenario: I test something but I make sure cache is cleared before startying this scenario
```

```php
// Class Tests\Integration\Behaviour\Features\Context\CommonFeatureContext
class CommonFeatureContext extends AbstractPrestaShopFeatureContext {
    /**
     * @AfterFeature @clear-cache-after-feature
     */
    public static function clearCacheAfterFeature()
    {
        self::clearCache();
    }

    /**
     * @BeforeFeature @clear-cache-before-feature
     */
    public static function clearCacheBeforeFeature()
    {
        self::clearCache();
    }

    /**
     * @BeforeScenario @clear-cache-before-scenario
     */
    public static function clearCacheBeforeScenario()
    {
        self::clearCache();
    }

    /**
     * Clears cache
     */
    private static function clearCache(): void
    {
        Address::resetStaticCache();
        Cache::clear();
        Carrier::resetStaticCache();
        Cart::resetStaticCache();
        // And many more but it's not the point here
    }
}
```

### Reboot kernel

```feature
@reboot-kernel-after-feature
@add
Feature: Add basic product from Back Office (BO)
  As a BO user
  I perform many modification is Symfony services so I reboot the kernel to reset everything for the following features

  Scenario: I test something that impacts CLDR, make a modification and test again I need to reset the service by resetting the whole kernel
    ...
    When I reboot kernel
    ...
```

```php
// Class Tests\Integration\Behaviour\Features\Context\CommonFeatureContext
class CommonFeatureContext extends AbstractPrestaShopFeatureContext {
    /**
     * This hook can be used to flag a feature for kernel reboot
     *
     * @AfterFeature @reboot-kernel-after-feature
     */
    public static function rebootKernelAfterFeature()
    {
        self::rebootKernel();
    }

    /**
     * @Given I reboot kernel
     */
    public function rebootKernelOnDemand()
    {
        self::rebootKernel();
    }
}
```

## behat.yml

When you have already created features and contexts it is time to map them with the test suite. The mapping is done in the behat.yml configuration file. It looks like this:
```yml
default:
    suites:
        customer:
            paths:
                - %paths.base%/Features/Scenario/Customer
            contexts:
                - Tests\Integration\Behaviour\Features\Context\CommonFeatureContext
                - Tests\Integration\Behaviour\Features\Context\CustomerManagerFeatureContext
                - Tests\Integration\Behaviour\Features\Context\Domain\CustomerFeatureContext
                - Tests\Integration\Behaviour\Features\Context\CustomerFeatureContext
                - Tests\Integration\Behaviour\Features\Context\Configuration\CommonConfigurationFeatureContext
                - Tests\Integration\Behaviour\Features\Transform\StringToBoolTransformContext
        category:
            paths:
                - %paths.base%/Features/Scenario/Category
            contexts:
                - Tests\Integration\Behaviour\Features\Context\CommonFeatureContext
                - Tests\Integration\Behaviour\Features\Context\CategoryFeatureContext
                - Tests\Integration\Behaviour\Features\Context\Domain\CategoryFeatureContext
```
As you can see, you have to define the `suite`, the `path` to features, and all the necessary `contexts`. According to the example, when you run the following: `./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml -s customer` - all the `*.feature` files from `tests/Integration/Behaviour/Features/Scenario/Customer` directory will be used to execute the related methods in all the provided contexts.
