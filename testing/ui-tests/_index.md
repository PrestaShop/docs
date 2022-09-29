---
title: UI tests
chapter: true
---

# UI Tests

## Introduction

We have some user interface tests (sometimes called web acceptance tests). These tests launch and control a browser, and perform several actions to check that the behavior, from the point of view of a real user, is as expected. These tests send actual HTTP requests and check the returned [DOM](https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model/Introduction).

These tests can be found in `UI` folders.

### Stack

UI tests work by controlling a browser and using the web interface like a real user.

We use the following stack:

* [Playwright](https://github.com/microsoft/playwright/) as automation tool
* [Mocha](https://mochajs.org/) as test framework
* [Chai](https://www.chaijs.com/) as assertion library 
* [Faker](https://github.com/faker-js/faker) as fake data generator

## Execute & Create tests

{{% children %}}

Everything is explained in [README](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/UI/README.md) in the `tests/UI` folder. 
You'll need a working installation of PrestaShop in order to run the tests.
