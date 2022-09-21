---
title: How to execute Integrations Tests
menuTitle: Executing integrations tests
weight: 10
---

# How to execute Integrations Tests

There are two integrations tests suite : 

* one for behat tests
* one for phpunit tests

Each suite needs a specific PHPUnit configuration. This is why each test suite has a specific composer command:

* `composer integration-tests`
* `composer integration-behaviour-tests`

{{% notice tip %}}
You can execute the entire PHPUnit test suites using the `composer test-all` command.
{{% /notice %}}