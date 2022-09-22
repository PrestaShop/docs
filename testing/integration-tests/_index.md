---
title: Integration tests
chapter: true
---

# Integration tests
## Introduction

Unit tests can validate the behavior of a PHP class when it can be isolated.
However, some classes cannot be validated this way. Moreover, a lot of logic from PrestaShop is written into complex SQL queries that this kind of test cannot validate. This is why we also need integration tests.

### Stack

We use the following stack:

* [Behat](https://behat.org) for tests that are meaningful scenarios from a user point of view
* [PHPUnit](https://phpunit.de) for tests that instead answer the need to test the technical behavior of a class or a component

## Execute & Create tests

{{% children %}}