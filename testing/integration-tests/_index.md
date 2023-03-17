---
title: Integration tests
chapter: true
---

# Integration tests
## Introduction

While unit tests can effectively validate the behavior of an isolated PHP class, there are certain classes that cannot be validated in this manner. Additionally, as a significant portion of PrestaShop's logic is written in complex SQL queries, this type of test may not be sufficient to validate them. Therefore, integration tests are also necessary to ensure proper validation and coverage.

### Stack

We use the following stack:

* [Behat](https://behat.org) for tests that are meaningful scenarios from a user point of view
* [PHPUnit](https://phpunit.de) for tests that instead answer the need to test the technical behavior of a class or a component

## Execute & Create tests

{{% children %}}
