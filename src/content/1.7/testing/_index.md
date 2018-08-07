---
title: Testing
weight: 3
pre: "<b>3. </b>"
chapter: true
---

### Chapter 3

# How testing works in PrestaShop

> Information valid since **PrestaShop** {{< minver v="1.7.4" >}}

Tests - since 1.7.4 - are located into `tests` folder. Tests are splitted into unit, integration and functional tests in PHP using PHPUnit testing framework. For end to end tests, we use Mocha.js and webdriver.io as bridge to control Selenium server.

## Execute PrestaShop test suites

### Execute PHPUnit test suites

At least four test suites are available, testing differents parts of PrestaShop software:

* `Legacy tests`: comes from PrestaShop 1.6: mix of unit, integration and functional tests;
* `Legacy controllers`: added to help with the Symfony migration, ensures that old Back Office controllers are still runables;
* `Admin tests`: specifics to PrestaShop 1.7, testing `src/Core` and `src/Adapter` parts of application;
* `Symfony specific tests`: specific to PrestaShop 1.7, testing `src/PrestaShopBundle` part of application;

For each of them, we need a specific configuration of PHPUnit this is why you retrieve every test suite executable as a specific composer command:

* `composer phpunit-legacy`
* `composer phpunit-controllers`
* `composer phpunit-admin`
* `composer phpunit-sf`

> You can execute the entire PHPUnit testsuites using `composer test-all` command.

### Execute Webdriver/Mocha test suite

Before executing the e2e tests you need to install the dependencies and create a configuration file.

1. In `tests/Selenium` folder, execute the command `npm install` (node 6+ && npm are required).
2. Create `settings.js` from [settings.dist.js](https://github.com/PrestaShop/PrestaShop/blob/develop/tests/Selenium/settings.dist.js) file.
3. Start the launch of test suite using `npm run test` command.

> If you want to display the brower, remove the `--headless` argument from webdriver.io configuration file.

# Create your own tests

## Unit test creation

Everything is explained in [PHPUnit 5.7 documentation](https://phpunit.de/manual/5.7/en/index.html).

To create unit test, we encourage you **strongly** to depend only the provided `TestCase` class by the Testing framework.

For instance:

```php
namespace Tests\Unit\Foo;

use PHPUnit\Framework\TestCase;

class BarTest extends TestCase
{
    /* ... */
}
```

Unit tests should be located into `Unit` folder and follow the same path than the tested class: if a class is located into `src/Core/Foo/Baz`, the unit test should be into `tests/Unit/Core/Foo/Baz` folder.

## Fonctional test creation

If you create your own Modern controllers or if you plan to help us writing new tests to cover the Core of PrestaShop, you can create
tests to cover parts of HTTP layer aka functional tests.

### Using PHPUnit

To create a functional test, we encourage you to rely on our own implementation of `WebTestCase`.

For instance:

```php
namespace Tests\Functional\Foo;

use Tests\Integration\PrestaShopBundle\Test\WebTestCase;

class BarTest extends WebTestCase
{
    public function testSomeAction()
    {
        $url = '/modules/your/action';
        /** or using the router
         * $this->router->generate(
         *     'route_name'
         * );
         */
        $this->client->request('GET', $url);
        
        $response = $this->client->getResponse();
        
        self::assertTrue($response->isSuccessful());
    }
}
```

Everything from the documentation of Symfony about [functional testing](https://symfony.com/doc/3.4/testing.html#functional-tests) is available here. 

