---
title: How to create your own web acceptance tests
menuTitle: Creating your own web acceptance tests
weight: 25
---

# How to create your own web acceptance tests or add tests to PrestaShop

Web Acceptance tests work by controlling a browser and using the web interface like a real user.

The stack is:
* [Puppeteer](https://github.com/puppeteer/puppeteer) as automation tool
* [Mocha](https://mochajs.org/) as test framework
* [Chai](https://www.chaijs.com/) as assertion library 
* [Faker](https://github.com/marak/Faker.js/) as fake data generator

## How does it work

We use the [Page Object Pattern](https://martinfowler.com/bliki/PageObject.html) to make a distinction between the test 
logic and the webpage logic.

The goal is to have only test-related logic in everything test-related, and all the low-level interaction with the 
webpage are delegated to page objects, containing everything: from selectors to functions to work on tables, forms, etc.

### Page Objects

You can see the page objects in `tests/puppeteer/pages`. Each page in PrestaShop is represented by a Javascript class.

The master class is `commonPage.js`. Every page is then represented by its own class in either the `BO` or `FO`
 folders. There is a second level of inheritance with `BO/BOBasePage.js` and `FO/FOBasePage.js`.
 
This organization lets you put FO or BO logic accessible by every objects.

### Tests files

Tests files are located in `tests/puppeteer/campaigns`. There are a few specials folders:
* `commonTests` contains reutilizable tests logic (like the BO `login()` function)
* `data` contains all data used by tests : new products/categories/customers to create, existing ones (from fixtures), etc
* `upgrade` contains everything related to the upgrade test scenario. This is still a WIP project as it's really
 complicated to make it work
* `utils` contains some helpers: working with files, use of globals variables, and lambda functions for puppeteer itself

Tests are located in the `sanity` and `functional` folders.

#### Sanity tests

The sanity campaign is a collection of basic tests to ensure critical functionalities of PrestaShop are still working: 
installation, CRUD of Products in BO, CRUD of Orders in BO, Crawling the catalog in FO, Modifying data in the cart and 
completing the checkout process.

At PrestaShop, the Sanity campaign is run for every Pull Request.

#### Functional tests

The functional campaign is a collection of low level functional test: the goal is to test every feature of every 
functionality. We go through every BO page and test everything: filters on tables, searching, modifying data via 
shortcuts, CRUD (when applicable). 

#### End to end tests (soon)

The End to end campaign tries to reproduce real user paths. It's a WIP.


## Running web acceptance tests

Everything is explained in the README in the `tests/puppeteer` folder. 
You'll need a working installation of PrestaShop.

## Creating a web acceptance test

The most important thing to remember is separation of concerns: you cannot have test logic in your 
page objects, and you cannot have use of page logic in your tests.
For example: 
* use of `expect` is possible **only** in your test files, never in your page objects
* use of selectors is possible **only** in your page objects, never in test files 

The goal is to write your test code *once*, and only change things (by following the evolution of the application) in your page objects.

Your page objects must inherit from `BO/BOBasePage` or `FO/FOBasePage`.

If you want your tests to be accepted in the PrestaShop repository, make sure to read the `CONVENTIONS.md` file in 
`tests/puppeteer/pages/`.
