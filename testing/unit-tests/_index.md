---
title: Integration tests
chapter: true
---

# Introduction

Unit tests are powered by [PHPUnit](https://phpunit.de). They test one and only one php class, mocking/stubbing any dependencies that class has.

This `Unit` folder meets some rules:

- One php class = one test file.
- The test filepath must follow the class filepath/
- Every dependency of the class must be replaced by [test doubles](https://martinfowler.com/articles/mocksArentStubs.html#TheDifferenceBetweenMocksAndStubs).

*If there is a hard-coded dependency such as a singleton pattern being used
or a static call, this class cannot be unit tested and should be tested using
integration tests.*

## Stack

We use the following stack:

* [PHPUnit](https://phpunit.de) as test framework


## Conventions

- Use camelCase names for test function names.
- Try to make method names explain the *intent* of the test case as best as possible. Don't hesitate to write long method names if necessary.
	- Bad example: `testGetPrice` (no idea what such a test is supposed to do)
	- Good example: `testDiscountIsAppliedToFinalPrice`


# Execute & Create tests

{{% children %}}