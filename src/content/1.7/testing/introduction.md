---
title: Introduction
weight: 1
---

# How testing works in PrestaShop
{{< minver v="1.7.3" title="true" >}}

PrestaShop is a complex software and uses automated testing to ensure that the new additions to the codebase do not break existing behaviors.

Automated tests are located in `tests` and `tests-legacy` folders.

## What kind of tests do PrestaShop use?

In the `tests` folder, you will find:

- Unit tests
- Integration tests
- User interface tests

### Unit tests

Unit tests are powered by [PHPUnit][1]. They test one and only one php class, mocking/stubbing any dependencies that class has.

This `Unit` folder meets some rules:

- One php class = one test file.
- The test filepath must follow the class filepath/
- Every dependency of the class must be replaced by [test doubles][2].

*If there is a hard-coded dependency such as a singleton pattern being used
or a static call, this class cannot be unit tested and should be tested using
integration tests.*

#### Conventions

- Use camelCase names for test function names.
- Try to make method names explain the *intent* of the test case as best as possible. Don't hesitate to write long method names if necessary.
	- Bad example: `testGetPrice` (no idea what such a test is supposed to do)
	- Good example: `testDiscountIsAppliedToFinalPrice`

### Integration tests

Unit tests can validate the behavior of a php class when it can be isolated.
However, some classes cannot be validated this way. Moreover, a lot of logic from PrestaShop is written into complex SQL queries that cannot be validated by those kind of tests. This is why we also need integration tests.

We use 2 technologies for the integration tests in the `Integration` folder:

- [Behat][3] for tests that are meaningful scenarios from a user point of view
- [PHPUnit][1] for tests which rather answer the need to test the technical behavior of a class or a component

### User Interface tests

Finally, we have some user interface tests (also sometimes referred to as web acceptance tests). These tests launch and control a browser that will then go on either the Front Office or the Back Office of a shop and perform several actions to check that the behavior, from the point of view of a browser, is as expected. So these tests send real HTTP requests and check the returned DOM.

These tests can be found in `UI` folders.

UI tests rely on [Playwright][4].

## What are legacy tests in `tests-legacy` folder?

We are currently refactoring how the test folder is structured. As this is a huge work that is going to take months, we have chosen the following strategy:

Tests that we are not satisfied by remain in the `tests-legacy` folder and will be, one by one, replaced by tests of a higher quality inside the `tests` folder.

We keep the legacy tests as they have value (they can detect mistakes in the modifications we bring to the codebase) but they are not being updated anymore as we want to replace them.

#### What was wrong with these legacy tests?

Theses tests were powered by PHPUnit but were not unit tests: they were integration tests, which means they would test several classes together and would run additional services such as a database. This has made this test quite complex and sometimes lead to random failures.


[1]: https://phpunit.de/
[2]: https://martinfowler.com/articles/mocksArentStubs.html#TheDifferenceBetweenMocksAndStubs
[3]: https://behat.org/en/latest/
[4]: https://github.com/microsoft/playwright/
