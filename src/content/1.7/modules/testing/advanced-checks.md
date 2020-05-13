---
title: Advanced checks
weight: 2
---

# Advanced checks

## PHPStan

- What is it
- Levels of checks
- How to run it on a "legacy" module (Compatibility PHP < 7.0)

## Unit tests

Having unit tests on a module can be challenging because of the relations between your code and PrestaShop's (i.e ObjectModels, context, Database instance). Even though the full coverage of a module cannot be reached, there is some business logic which can be isolated and tested.

The main tools used for unit testing is [PHPUnit](https://phpunit.de/). 

Like other PHP testing tools, it can be installed in your project with composer. Take care to install it in your **development dependencies** to avoid distributing in your production releases.

```bash
composer require --dev phpunit/phpunit:5.7
```

While newer versions of PHPUnit exist, the version chosen in your project must match the PHP compatibility range of the project, otherwise composer will refuse to install it. The version provided in the example above is the last one compatible with PHP 5.6.

Creating your unit tests can be done the same way as the core, so more details can be found in 
the chapter [Testing of the core]({{< ref "1.7/testing/how-to-create-your-own-unit-tests" >}}).

Supposing it was installed via Composer, the command to run it is:

```
php vendor/bin/phpunit tests
```

The following example provides the output expected by this tool when 19 unit tests have been created in the `tests/` folder and pass:

```
$ php vendor/bin/phpunit tests
PHPUnit 5.7.27 by Sebastian Bergmann and contributors.

...................                                19 / 19 (100%)

Time: 40 ms, Memory: 4.00MB

OK (19 tests, 28 assertions)
```