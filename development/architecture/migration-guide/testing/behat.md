---
title: Behat testing
menuTitle: Behat testing
weight: 20
---

# Behat testing

{{% notice tip %}}
It is important that you get familiar with the `Behats` principles before reading further. You can find the official behat documentation [here](https://docs.behat.org/en/latest/guides.html).
{{% /notice %}}

A behaviour (`behat`) tests are a part of integration tests. They allow testing how multiple components are working together. In PrestaShop, behats are used to test the `Application` and `Domain` layer integration - basically all the [CQRS](/1.7/development/architecture/domain/cqrs) commands and queries.

## Database
During behat tests the actual database queries are executed, therefore before testing you need to run a command `composer create-test-db` to create a test database.

{{% notice %}}
The `create-test-db` script installs a fresh prestashop with fixtures in a new database called `test_{your database name}` and dumps the database in your machine `/tmp` directory named `ps_dump.sql`. That `ps_dump.sql` is later used to reset the database. You can check the actual script for more information - [/tests-legacy/create-test-db.php](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/tests-legacy/create-test-db.php).
{{% /notice %}}

## Behats structure in PrestaShop

Behat related files are located in [tests/Integration/Behaviour/](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour). This directory contains following files:
- [behat.yml]({{< relref "#behatyml">}}) - this is the test suites configuration file which describes feature paths and contexts for every test suite. It can be passed as an argument when running the tests like this `./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml`.
- bootstrap.php - this file loads the `Kernel` for a behat tests environment.
- Features - this directory contains all the [Scenarios](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour/Features/Scenario) and [Contexts](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour/Features/Context). More about it [below]({{< relref "#features" >}}).

## Features

{{% notice tip %}}
Before continuing, **please read the official `behat` documentation** about the [features and scenarios](https://docs.behat.org/en/latest/user_guide/features_scenarios.html).
{{% /notice %}}

In PrestaShop all `*.feature` files are placed in [.tests/Integration/Behaviour/Features/Scenario](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour/Features/Scenario). Each feature is placed in a dedicated directory organized by `domain` (or even a `subdomain` if necessary). These feature files contains text that describes the testing scenarios in a user-friendly manner, each of them must start with a keyword `Feature` and have a one or multiple scenarios starting with a keyword `Scenario`. For example:
```
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

The behat `Context` files are classes that contains the implementations of the features. In PrestaShop all `Context` files are placed in [tests/Integration/Behaviour/Features/Scenario](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour/Features/Context).

{{% notice tip %}}
The most recent `Context` files are located in [`Tests/Integration/Behaviour/Features/Context/Domain`](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour/Features/Context/Domain) namespace, so try to use these and avoid the ones from the `Tests/Integration/Behaviour/Features/Context/*` namespace (those are old and might not be implemented well).
{{% /notice%}}

When creating a new Context class, it should extend the [`AbstractDomainFeatureContext`](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/tests/Integration/Behaviour/Features/Context/Domain/AbstractDomainFeatureContext.php).

{{% notice %}}
The [`AbstractDomainFeatureContext`](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/tests/Integration/Behaviour/Features/Context/Domain/AbstractDomainFeatureContext.php) contains some commonly used helper methods, and it implements the `Behat\Behat\Context` which is necessary for these tests to work.
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

The [SharedStorage](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/tests/Integration/Behaviour/Features/Context/SharedStorage.php) is responsible for holding certain values in memory which are shared across the feature. The most common usage example is the `id` reference - we specify a certain keyword e.g. `product1` before creating it, and once the command returns the auto-incremented value, we set it in shared storage like this `SharedStorage::getStorage()->set($orderReference, $orderId->getValue());`. In upcoming scenarios we can reuse this reference to get the record, something like this:
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

Behats allow you to use [hooks](https://docs.behat.org/en/v2.5/guides/3.hooks.html#hooks). You can find some usages in [CommonFeatureContext](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/tests/Integration/Behaviour/Features/Context/CommonFeatureContext.php). You can use these hooked methods by tagging them before the `Feature` (or before `Scenario` depending on the hook type), like this ([add_product.feature](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/tests/Integration/Behaviour/Features/Context/Domain/Product/AddProductFeatureContext.php)
):

```
@clear-cache-before-feature
@clear-cache-after-feature
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO

```

{{% notice tip %}}
You can also tag specific `features` if you want to run only them with a `--tags` filter. For example, if you add following tag in your Feature:
```
@add
Feature: Add basic product from Back Office (BO)
  As a BO user
  I need to be able to add new product with basic information from the BO
    ...
```
Then you can run only this feature by following command `./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml -s product --tags add`

{{% /notice %}}


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
