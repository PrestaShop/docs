---
title: Web acceptance tests 
menuTitle: Web acceptance tests 
weight: 30
chapter: true
---

# Introduction

Web Acceptance tests work by controlling a browser and using the web interface like a real user.

We use the following stack:

* [Puppeteer](https://github.com/puppeteer/puppeteer) as automation tool
* [Mocha](https://mochajs.org/) as test framework
* [Chai](https://www.chaijs.com/) as assertion library 
* [Faker](https://github.com/marak/Faker.js/) as fake data generator

## Running web acceptance tests

Everything is explained in README in the `tests/puppeteer` folder. 
You'll need a working installation of PrestaShop in order to run the tests.
