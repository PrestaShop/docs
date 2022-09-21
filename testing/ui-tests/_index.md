---
title: UI tests
weight: 30
chapter: true
---

# Introduction

UI tests work by controlling a browser and using the web interface like a real user.

We use the following stack:

* [Playwright](https://github.com/microsoft/playwright/) as automation tool
* [Mocha](https://mochajs.org/) as test framework
* [Chai](https://www.chaijs.com/) as assertion library 
* [Faker](https://github.com/marak/Faker.js/) as fake data generator

## Running web acceptance tests

Everything is explained in [README](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/UI/README.md) in the `tests/UI` folder. 
You'll need a working installation of PrestaShop in order to run the tests.
