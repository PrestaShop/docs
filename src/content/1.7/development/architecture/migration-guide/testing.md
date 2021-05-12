---
title: Testing
weight: 70
---

# Testing

You are encouraged to add both unit and functional tests for every new class
you have created.

You **must** add a smoke test (also called "survival") for every new page you migrate.

## Smoke testing

A smoke test is a really simple and basic test that ensure the page will load with 
the right HTTP code. This won't ensure the page will works as expected **but** if the test fails, this ensure the page is not functional.

To add a new test, you need to add a new entry in the Data Provider of SurvivalTest class:

```php
<?php

namespace LegacyTests\Integration\PrestaShopBundle\Controller\Admin;
// ...
/**
 * @group demo
 *
 * To execute these tests: use "./vendor/bin/phpunit -c tests-legacy/phpunit-admin.xml --filter=SurvivalTest" command.
 */
class SurvivalTest extends WebTestCase
{
    // [...]

    public function getDataProvider()
    {
        return [
            'symfony_route_of_page' => ['Page title', 'symfony_route_of_page'],
            // ...
        ];
    }
}
```

## Behavioural testing

{{% notice tip %}}
Read official behat documentation [here](https://docs.behat.org/en/latest/guides.html).
{{% /notice %}}

A behaviour (`behat`) tests are a part of integration tests. They allow testing how multiple components are working together. In PrestaShop, behats are used to test the `Application` and `Domain` layer integration - basically all the [CQRS](/1.7/development/architecture/domain/cqrs) commands and queries.


### Behats structure in PrestaShop

Behat related files are located in [tests/Integration/Behaviour/](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour). This directory contains following files:
- behat.yml - this is the test suites configuration file which describes feature paths and contexts for every test suite. It can be passed as an argument when running the tests like this `./vendor/bin/behat -c tests/Integration/Behaviour/behat.yml`.
- bootstrap.php - this file loads the `Kernel` for a behat tests environment.
- Features - this directory contains all the [Scenarios](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour/Features/Scenario) and [Contexts](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/tests/Integration/Behaviour/Features/Context). More about it [bellow]({{< relref "#behat-features" >}}).


### Features

todo
