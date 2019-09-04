---
title: Testing
weight: 3
pre: "<b>3. </b>"
chapter: true
---

### Chapter 3

# How testing works in PrestaShop
{{< minver v="1.7.3" title="true" >}}

PrestaShop is a complex software and uses automated testing to ensure that the new additions to the codebase do not break existing behaviors.

Automated tests are located into `tests` and `tests-legacy` folders.

#### What kind of tests do PrestaShop use ?

In the `tests` folder, you will find:

- unit tests
- integration tests
- web acceptance tests

##### Unit tests

Unit tests are powered by [PHPUnit][1]. They test one and only one php class, mocking/stubbing any dependencies that class has.

This `Unit` folder meets some rules:

- One php class = one test file.
- The test filepath must follow the class filepath/
- Every dependency of the class must be replaced by [test doubles][2]*.

*If there is a hard-coded dependency such as a singleton pattern being used
or a static call, this class cannot be unit tested and should be tested using
integration tests.

##### Conventions

- Use camelCase names for test function names.
- Try to make method names explain the *intent* of the test case as best as possible. Don't hesitate to write long method names if necessary.
	- Bad example: `testGetPrice` (no idea what such a test is supposed to do)
	- Good example: `testDiscountIsAppliedToFinalPrice`

##### Integration tests

Unit tests can validate the behavior of a php class when it can be isolated.
However some classes cannot be validated this way. Moreover, a lot of logic from PrestaShop is written into complex SQL queries that cannot be validated by those kind of tests. This is why we also need integration tests.

We use 2 technologies for the integration tests in the `Integration` folder:

- [Behat][3] for tests that are meaningful scenarios from a user point of view
- PHPUnit for tests which rather answer the need to test the technical behavior of a class or a component

##### Web acceptance tests

Finally, we have some web acceptance tests. These tests launch and control a browser that will then go on either the FO or the BO of a shop and perform several actions to check that the behavior, from the point of view of a browser, is as expected.

These tests can be found in `E2E`, `Selenium` and `puppeeter` folders. There are slowly being merged into the `puppeeter` folder.

They rely on Mocha.js and use webdriver.io as bridge to control a Selenium server.


#### What are legacy tests in `tests-legacy` folder ?

We are currently refactoring how the test folder is structured. As this is a huge work that is going to take months, we have chosen the following strategy:

Tests that we are not satisfied of* remain in the `tests-legacy` folder and will be, one by one, replaced by tests of a higher quality inside the `tests` folder.

We keep the legacy tests as they have value (they are able to detect mistakes in the modifications we bring to the codebase) but they are not being updated anymore as we want to replace them.

#### What was wrong with these legacy tests ?

Theses tests were powered by PHPUnit but were not unit tests: they were integration tests, which means they would test several classes together, and would run additionnal services such as a database. This has made this test quite complex and sometimes lead to random failures.

[1]: https://phpunit.de/
[2]: https://martinfowler.com/articles/mocksArentStubs.html#TheDifferenceBetweenMocksAndStubs
[3]: http://behat.org/en/latest/