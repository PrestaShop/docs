---
title: How to create your own tests
menuTitle: Creating your own tests
weight: 20
---

# How to create your own tests

## Creating a Unit test

Everything is explained in the [PHPUnit 5.7 documentation](https://phpunit.de/manual/5.7/en/index.html).

For unit tests, we **strongly** encourage you to base your test on the PHPUnit's `TestCase` class _only_.

For instance:

```php
namespace Tests\Unit\Foo;

use PHPUnit\Framework\TestCase;

class BarTest extends TestCase
{
    /* ... */
}
```

Unit tests should be located into `Unit` folder and follow the same path as the tested class: if a class is located into `src/Core/Foo/Baz`, the unit test should be into `tests/Unit/Core/Foo/Baz` folder.

## Creating a functional test

### Using PHPUnit

If you create your own Modern controllers or if you plan on migrating a legacy one, you can create
tests to cover parts of HTTP layer aka functional tests.

To create a functional test, we encourage you to base your test class on our own implementation of `WebTestCase`.

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

Find out more in [Symfony's documentation on functional testing](https://symfony.com/doc/3.4/testing.html#functional-tests). 

