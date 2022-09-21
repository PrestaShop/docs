---
title: Integration tests
chapter: true
---

# Introduction

Unit tests can validate the behavior of a php class when it can be isolated.
However, some classes cannot be validated this way. Moreover, a lot of logic from PrestaShop is written into complex SQL queries that cannot be validated by those kind of tests. This is why we also need integration tests.

We use 2 technologies for the integration tests in the `Integration` folder:

- [Behat](https://behat.org) for tests that are meaningful scenarios from a user point of view
- [PHPUnit](https://phpunit.de) for tests which rather answer the need to test the technical behavior of a class or a component

## Stack

We use the following stack:

* [Behat](https://behat.org)
* [PHPUnit](https://phpunit.de) as test framework

# Execute & Create tests

{{% children %}}