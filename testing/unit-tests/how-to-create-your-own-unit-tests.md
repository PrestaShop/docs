---
title: How to create your own unit tests
menuTitle: Creating your own unit tests
weight: 20
aliases:
  - /8/testing/how-to-create-your-own-unit-tests/
---

# How to create your own unit tests or add tests to PrestaShop

Unit tests are great if you want to validate the behavior of a single unit of code. By "unit of code" we usually mean a class although it could also be a script.

## Creating a Unit test

Everything is explained in the [PHPUnit 5.7 documentation](https://phpunit.de/manual/5.7/en/index.html).

For unit tests, we **strongly** encourage you to base your test on the PHPUnit's `TestCase` class _only_.

For instance:

```php
<?php
namespace Tests\Unit\Foo;

use PHPUnit\Framework\TestCase;

class BarTest extends TestCase
{
    /* ... */
}
```

Unit tests should be located into `tests/Unit` folder and follow the same path as the tested class: if a class is located into `src/Core/Foo/Baz`, the unit test should be into `tests/Unit/Core/Foo/Baz` folder.


