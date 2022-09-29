---
title: How to execute Unit Tests
menuTitle: Executing unit tests
weight: 10
---

# How to execute Unit Tests

You can execute the test suite with specific Composer command:

* `composer unit-tests`

{{% notice tip %}}
You can execute the entire PHPUnit test suites using the `composer test-all` command.
{{% /notice %}}

## Executing the Functional test suites

This is thoroughly explained in the [Puppeteer tests Readme file](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/UI/README.md).

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
