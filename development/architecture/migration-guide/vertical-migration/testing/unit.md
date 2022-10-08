---
title: Unit testing
menuTitle: Unit testing
weight: 10
---
# Unit testing

## Smoke testing

A smoke test is a really simple and basic test that ensure the page will load with 
the right HTTP code. This won't ensure the page will works as expected **but** if the test fails, this ensure the page is not functional.

To add a new test, you need to add a new entry in the Data Provider of FrameworkBundleAdminControllerTest class:

```php
<?php

namespace Tests\Integration\PrestaShopBundle\Controller\Admin;
// ...
/**
 * @group demo
 *
 * To execute these tests: use "./vendor/bin/phpunit -c tests/Integration/phpunit.xml tests/Integration/PrestaShopBundle/Controller/Admin/FrameworkBundleAdminControllerTest.php" command.
 */
class FrameworkBundleAdminControllerTest extends WebTestCase
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
