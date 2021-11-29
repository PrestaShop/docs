---
title: How to execute tests
menuTitle: Executing tests
weight: 10
---

# How to execute the PrestaShop automatic test suite

## Executing Unit/integration test suites

At least four test suites are available, testing different parts of PrestaShop:

* `Legacy tests`: heritage from PrestaShop 1.6: mix of unit, integration and functional tests;
* `Legacy controllers`: added to help with the Symfony migration, ensures that old Back Office controllers are still runnable;
* `Admin tests`: tests `src/Core` and `src/Adapter` classes;
* `Symfony specific tests`: test classes from `src/PrestaShopBundle`

Each suite needs a specific PHPUnit configuration. This is why each test suite has a specific composer command:

* `composer phpunit-legacy`
* `composer phpunit-controllers`
* `composer phpunit-admin`
* `composer phpunit-sf`

{{% notice tip %}}
You can execute the entire PHPUnit test suites using the `composer test-all` command.
{{% /notice %}}

## Executing the Functional test suites

This is thoroughly explained in the [Puppeteer tests Readme file](https://github.com/PrestaShop/PrestaShop/blob/develop/tests/UI/README.md).

## Executing only part of phpunit tests

When implementing a new feature it is much faster to run only your specific tests. You can run only one test class with phpunit. But you must provide the phpunit.xml configuration to get the test environment bootstrapped correctly.

```
vendor/bin/phpunit -c tests/Unit/phpunit.xml tests/Unit/PrestaShopBundle/Command/ConfigCommandTest.php
```

Or even just few test methods

```
vendor/bin/phpunit --debug -c tests/Unit/phpunit.xml tests/Unit/PrestaShopBundle/Command/ConfigCommandTest.php --filter testSet
```

{{% notice tip %}}
Hint: `--debug` without `--filter` gives a nice list to filter with.
{{% /notice %}}
