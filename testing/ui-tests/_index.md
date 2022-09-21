---
title: UI tests
chapter: true
---

# Introduction

Finally, we have some user interface tests (also sometimes referred to as web acceptance tests). These tests launch and control a browser, perform several actions to check that the behavior, from the point of view of a real user, is as expected. So these tests send real HTTP requests and check the returned DOM.

These tests can be found in `UI` folders.

UI tests rely on [Playwright](https://github.com/microsoft/playwright/).

## Stack

UI tests work by controlling a browser and using the web interface like a real user.

We use the following stack:

* [Playwright](https://github.com/microsoft/playwright/) as automation tool
* [Mocha](https://mochajs.org) as test framework
* [Chai](https://www.chaijs.com) as assertion library 
* [Faker](https://github.com/marak/Faker.js/) as fake data generator

# Execute & Create tests

{{% children %}}

