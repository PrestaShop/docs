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

## Checking for code coverage in phpunit tests

To check if you covered everything in your test cases, it's best to run the tests with [phpunit coverage report](https://phpunit.readthedocs.io/en/9.5/code-coverage-analysis.html).

First, get your [environment up and running]({{< relref "/8/basics/installation" >}}). 

Then, [install and enable Xdebug](https://xdebug.org/docs/install).

Finally, run your tests with coverage enabled:

```bash
XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-text -c tests/Unit/phpunit.xml tests/Unit/PrestaShopBundle/Command/ConfigCommandTest.php
```

{{% notice note %}}
You may use a [Dockerized environment to run the project]({{< relref "/8/basics/installation/environments/docker" >}}).

After that is up and running, you need to compile and enable Xdebug:

```bash
docker compose exec prestashop_container pecl install xdebug #prestashop_container is the container's name
docker compose exec prestashop_container docker-php-ext-enable xdebug #prestashop_container is the container's name
```

Then run your tests with coverage enabled:

```bash
docker compose exec -e XDEBUG_MODE=coverage prestashop_container vendor/bin/phpunit --coverage-text -c tests/Unit/phpunit.xml tests/Unit/PrestaShopBundle/Command/ConfigCommandTest.php
```
{{% /notice %}}

This will give you a nice report of how much of your code was covered by the tests, and you can extend your tests to get closer to a perfect score of 100%.

{{% notice tip %}}
Running the coverage check does take a bit of time, be patient.
{{% /notice %}}