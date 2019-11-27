---
title: How to create your own web acceptance tests
menuTitle: Creating your own web acceptance tests
weight: 25
---

# How to create your own web acceptance tests or add tests to PrestaShop

Web Acceptance tests work by controlling a browser and using the web interface as a real user.

We use:
* [Puppeteer](https://github.com/puppeteer/puppeteer) as automation tool
* [Mocha](https://mochajs.org/) as test framework
* [Chai](https://www.chaijs.com/) as assertion library 
* [Faker](https://github.com/marak/Faker.js/) as fake data generator

## How does it work

We use [Page Object Pattern](https://martinfowler.com/bliki/PageObject.html) to distinguish the test logic from 
the web page logic.

The goal is to have only test-related logic in everything test-related, and all the low-level interactions with the 
webpage are delegated to page objects, containing everything from selectors to functions in order to work on 
tables, forms, etc.

### Page Objects

You can see the page objects in `tests/puppeteer/pages`. Each page in PrestaShop is represented by a Javascript class.

The master class is `commonPage.js`. All pages are then represented by their own class in both the `BO` and `FO`
 folders. There is a second level of inheritance with `BO/BOBasePage.js` and `FO/FOBasePage.js`.
 
This organization allows you to let the FO or BO logic to be accessible by all objects.

### Tests files

Tests files are located in `tests/puppeteer/campaigns`. There are a few special folders:
* `commonTests` contains reutilizable test logic (like the BO `login()` function)
* `data` contains all data used by tests: new products/categories/customers to be and existing ones (from fixtures), etc
* `upgrade` contains everything related to the upgrade test scenario. This is still a WIP project as it's really
 complicated to make it work
* `utils` contains some helpers: working with files, use of global variables, and random functions for puppeteer itself

Tests are located in the `sanity` and `functional` folders.

#### Sanity tests

The sanity campaign is a collection of basic tests which are ensuring that critical functionalities of PrestaShop are 
working: 
installation, CRUD of Products in BO, CRUD of Orders in BO, Crawling the catalog in FO, Modifying data in the cart and 
completing the checkout process.

At PrestaShop, the Sanity campaign is run for every Pull Request.

#### Functional tests

The functional campaign is a collection of low level functional tests: the goal is to test each feature of all 
functionalities. We go through all BO pages and test everything: filters on tables, searching, modifying data via 
shortcuts, CRUD (when applicable). 

#### End to end tests (soon)

The End to end campaign tries to reproduce real user paths. It's a WIP.


## Running web acceptance tests

Everything is explained in README in the `tests/puppeteer` folder. 
You'll need a working installation of PrestaShop in order to run the tests.

## Creating a web acceptance test

The most important thing to remember is separation of concerns: you cannot have test logic in your 
page objects, and you cannot have use of page logic in your tests.
For example: 
* use of `expect` is possible **only** in your test files, never in your page objects
* use of selectors is possible **only** in your page objects, never in test files 

The goal is to write your test code *once*, and only change things (by following the evolution of the application) in 
your page objects.

Your page objects must inherit from `BO/BOBasePage` or `FO/FOBasePage`. You will then be able to use the methods from 
these files in order to make your tests more readable. Remember [KISS](https://en.wikipedia.org/wiki/KISS_principle) 
and [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) !

If you want your tests to be accepted in the PrestaShop repository, make sure to read the `CONVENTIONS.md` file in 
`tests/puppeteer/pages/`.
