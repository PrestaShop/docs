---
title: How to execute Integration Tests
menuTitle: Executing integration tests
weight: 10
---

# How to execute Integration Tests

There are two integration tests suites : 

* one using Behat
* one for PHPUnit tests

Each suite needs a specific PHPUnit configuration. This is why each test suite has a specific Composer command:

* `composer integration-tests`
* `composer integration-behaviour-tests`

{{% notice tip %}}
You can execute the entire PHPUnit test suites using the `composer test-all` command.
{{% /notice %}}