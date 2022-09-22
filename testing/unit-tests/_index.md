---
title: Unit tests
chapter: true
---

# Unit tests

## Introduction

Unit tests are powered by [PHPUnit](https://phpunit.de). They test one and only one PHP class, mocking/stubbing any dependencies that class might have.

This `Unit` folder meets some rules:

- One PHP class = one test file.
- The test file path must follow the class filepath/
- Every class dependency must be replaced by [test doubles](https://martinfowler.com/articles/mocksArentStubs.html#TheDifferenceBetweenMocksAndStubs).

*If there is a hard-coded dependency such as a singleton pattern being used
or a static call, this class cannot be unit tested and should be tested using
integration tests.*

### Stack

We use the following stack:

* [PHPUnit](https://phpunit.de) as test framework


### Conventions

- Use `camelCase` names for test function names.
- Try to make method names explain the *intent* of the test case as best as possible. Don't hesitate to write long method names if necessary.
	- Bad example: `testGetPrice` (no idea what such a test is supposed to do)
	- Good example: `testDiscountIsAppliedToFinalPrice`


## Execute & Create tests

{{% children %}}