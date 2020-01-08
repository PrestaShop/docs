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
* `Admin tests`: specific to PrestaShop 1.7, tests `src/Core` and `src/Adapter` classes;
* `Symfony specific tests`: specific to PrestaShop 1.7, test classes from `src/PrestaShopBundle`

Each suite needs a specific PHPUnit configuration. This is why each test suite has a specific composer command:

* `composer phpunit-legacy`
* `composer phpunit-controllers`
* `composer phpunit-admin`
* `composer phpunit-sf`

{{% notice tip %}}
You can execute the entire PHPUnit testsuites using the `composer test-all` command.
{{% /notice %}}

## Executing the StarterTheme test suites

{{% notice note %}}
Note: This suite is being phased out by the new E2E tests suite
{{% /notice %}}

Before executing the StarterTheme tests you need to install the dependencies and create a configuration file.

1. In `tests/Selenium` folder, execute the command `npm install` (node 6+ && npm are required).
2. Create `settings.js` from [settings.dist.js](https://github.com/PrestaShop/PrestaShop/blob/develop/tests/Selenium/settings.dist.js) file.
3. Start the launch of test suite using `npm run test` command.

{{% notice tip %}}
If you want to display the browser, remove the `--headless` argument from webdriver.io configuration file.
{{% /notice %}}

Find out more in the [StarterTheme tests Readme file](https://github.com/PrestaShop/PrestaShop/blob/develop/tests/Selenium/README.md).

## Executing the Functional End-to-End (E2E) test suites

This is thoroughly explained in the [Puppeteer tests Readme file](https://github.com/PrestaShop/PrestaShop/blob/develop/tests/puppeteer/README.md).
