---
title: Testing
weight: 70
---

# Testing

You are encouraged to add both unit and functional tests for every new class
you have created.

You are required to add a smoke test (also called "survival") for every new page
you migrate.

## Smoke testing

A smoke test is a really simple and basic test that ensure the page will load with 
the right HTTP code. This won't ensure the page will works as expected **but** if the test fails, this ensure the page is not functional.

To add a new test, you need to add a new entry in the Data Provider of SurvivalTest class:

```php
<?php

namespace LegacyTests\Integration\PrestaShopBundle\Controller\Admin;
use LegacyTests\Integration\PrestaShopBundle\Test\WebTestCase;
use PrestaShopBundle\Security\Admin\Employee as LoggedEmployee;
use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
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
