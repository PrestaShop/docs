---
title: How to contribute and create UI tests
menuTitle: Creation of UI tests
weight: 2
---

# How to contribute and create UI tests

## Architecture
[Page Object Model](https://martinfowler.com/bliki/PageObject.html) (also called Page Object Pattern) is a way to organize your code in a test framework. It encourages you to separate your test logic from your page manipulation logic.

Our team uses POM as an architecture to organize the code: on one side we have our page logic, and on the other side we have our test logic.

The goal is to write your test code once, and only change the page logic when someone updates the application.

Both are described in the following paragraphs.

## Pages

### Name
The name of the class must be simple and linked to the page in the shop. You should be able to find the corresponding page in the application using the folder hierarchy, and the class name.

The convention for naming the file itself is different: the main page name is always `index.js`, while other pages should always have a relevant name.

Example:
 
For BO products pages located at `pages/catalog/products/`, we use 2 classes:

- `index.js` for the products listing page (main page)
- `add.js` for the add/edit product page
 
### Inheritance
We heavily use inheritance in the pages to make sure all our generic methods are available from everywhere, and you don’t need to instantiate separate objects. 

There is a main mother class, called `CommonPage`, located at the root of the `pages` folder.

We have another level of inheritance in each root folder (`BO` and `FO`) through the classes `BOmainPage.js` and `FOMainPage.js`. Of course, `CommonPage` is **not** meant to be instantiated (it’s kind of an abstract class) !

When you create new page classes, make sure to make them inherit from their respective `XXMainPage` to be sure to be able to use both generic methods and specific methods.

Examples: 

- Install page (which is independent) extends from `CommonPage`
- Brands page (which is part of the BO) extends from `BOBasePage`
- Checkout page (which is part of the FO) extends from `FOBasePage`  

### Methods
Methods inside a page class must be properly named about their primary function. Remember to [KISS](https://en.wikipedia.org/wiki/KISS_principle) ! You should be able to understand what a method does just by looking at its name.

Methods inside a page class **CANNOT USE** the `expect` keyword or any kind of asserting function, since their sole purpose is to interact with the page they’re linked with. They don’t validate anything per se, they just expose functionalities. 
To validate a behavior in your test logic, your methods can return booleans, integers (number of lines, elements, etc), strings, objects... It’s up to you.

Example: 
```js
   /**
   * Get order status
   * @param page
   * @return {Promise<string>}
   */
  async getOrderStatus(page) {
    return this.getTextContent(page, `${this.orderStatusesSelect} option[selected='selected']`, false);
  }
```
This method returns the text content of the selected option in the Status `select` element in the Orders page.

### Selectors
Selectors are used on every page and are stored as attributes of the class. They should be named following this convention: **nameType** in `camelCase`, with `name` being the distinctive information about the element and `type` being its type (see below).

For example, a button used to submit the main form in the order page should be named: `submitMainFormButton`.


### Types
Each selector must belong to a certain type. Here is a non-exhaustive list:

- Button, link, block, image, icon, text, modal, **other HTML elements...**
- Table, table-header, row, column, **other table elements...**
- Form, input, select, radio, checkbox, **other forms inputs...**

## Tests

### Campaigns
We currently have 2 [campaigns](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/tests/UI/campaigns) implemented:

- **Sanity**: its purpose is to validate a Pull Request. Executed on [Travis CI](https://travis-ci.com/), [this campaign](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/tests/UI/campaigns/sanity) must fully pass before merging the PR (one failed test blocks the merge). It consists of a few tests of the core features of PrestaShop: shop installation, orders/products pages in BO, and catalog/cart/checkout process in FO.
- **Functional**: it is the biggest and most important [campaign](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/tests/UI/campaigns/functional). Its purpose is to validate that every feature of PrestaShop works, by testing them one by one. It goes on every page and tests whatever it can: table (filtering, ordering, quick edits, etc), [CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete) items (orders, customers, products…), setting changes, etc.

We plan on implementing 2 more campaigns:

- **End to end**: its purpose is to check that popular user paths are working as intended. It will walk through the application and mimic a real user working on their daily routines as a merchant: checking products, generating invoices, creating a customer account, and an order, adding a special voucher for a specific user, etc. The selected user paths will be chosen by the Product Team. Thanks to their merchants and agencies interviews, they have a pretty good idea of what merchants do every day and how they use the software.
- **Regression**: a test campaign tailored to only target major and critical issues in the few last versions of PrestaShop, to make sure they don’t come back (hence the name).

### Mocha and Mochawesome
[Mocha](https://mochajs.org/) is our test runner (a framework that reads our test code and runs it). We use it in coordination with [Mochawesome](https://www.npmjs.com/package/mochawesome), a plugin for Mocha. Mochawesome produces a full JSON report in addition to a beautiful HTML report (which we don’t really use). The JSON file is sent to our [Nightly Board](https://nightly.prestashop.com/), it is then inserted into the database to let visitors browse reports and visualize statistics.

#### Lambda function in describes
Using lambda functions in mocha is [discouraged](https://mochajs.org/#arrow-functions). They bind `this` to the scope of the lambda function, making it impossible to use internal Mocha methods and objects. Since we may use the Mocha context to store some variables in the future, we strongly advise you to use the normal `function()` syntax.  

### Utils
The utils directory contain files that are necessary to run tests.

#### Globals
This file contains all global variables that can be used in test files, pages and common tests.

The description of each variable in this file can be found in [README.md](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/tests/UI/README.md).

#### Setup
[Mocha](https://mochajs.org/) gives us the possibility to load and run files before test files (with [\--file option](https://mochajs.org/#-file-filedirectoryglob)).
We use that option to run our `setup.js` file. This file opens only one browser for the whole campaign (and not one browser per test), since we're then running each test file in its [own context](https://github.com/microsoft/playwright/blob/main/docs/src/api/class-browsercontext.md).

#### Browser helper
This helper file is used to centralize the browser and tab functions called in all tests. 
This approach has one goal : to have the same browser’s configuration everywhere and of course to facilitate maintenance.

The functions that exist (for now) in this file are the following:

- `createBrowser`: used to create a browser with the global configuration, we create one browser for the whole campaign
- `closeBrowser`: usually called at the end of a run, to close the browser created and delete the downloaded files
- `createBrowserContext`: used to create a browser context, a browser can have multiple contexts that don't share cookies/cache
- `closeBrowserContext`: usually called at the end of a test, to close the browser context created for the test
- `newTab`: allows us to open a new tab in a browser

Note that all these functions are used in mocha hooks functions in the global `describe` but can be called somewhere else.

#### Files
Some of our tests need to create files (ex: Create files in BO), or to check some text in a PDF file (ex: Create and check invoice). For this specific need, we use some functions in `Files.js`.

When a test is finished, all created files are deleted using a function from the same file : `deleteFile`, following the "[cleaning behind](#cleaning-behind)" approach.

### Require pages
In each and every test, we `require` the pages that will be needed. The initialization is done when you require the class (no need to use the `new` keyword).

Example:

```js
// For test 'Filter Customer'
const dashboardPage = require('@pages/BO/dashboard');
const customersPage = require('@pages/BO/customers');
```
  
### Expect
We use the `expect` keyword from the [Chai library](https://www.chaijs.com/api/bdd/). This allows us to write assertions in a much more readable way. You can use whatever way to assert you want/need. Don’t forget that you can use the second argument of `expect` to log out a better error message when your assertion fails.

Example :

```js
Const isCustomerConnected = await foLoginPage.isCustomerConnected(page);
await expect(isCustomerConnected, 'Customer is disconnected in FO').to.be.true;
```  

### Test identifier
Our team thinks it’s very important to be able to follow how tests results evolve, so it’s been decided to add a unique identifier to every step in the test.

Why? To be able to identify each and every test and compare from one report to another, to know how the results change.

For example, you could have 10 failed tests one day, and 10 the day after. How do you know if it’s the same 10 tests failing, or another distribution (for example, 5 tests fixed, 5 other tests failing)? With this system we can calculate the trend and show it on the Nightly Board.

We first create a base context for each and every test file, and then we make a call to the function `addContextItem` with the unique value for this step, inside the test file. 

Example :

```js
// From test : UI/campaigns/functional/BO/04_customers/01_customers/07_helpCard.js
const baseContext = 'functional_BO_customers_customers_helpCard';
// And inside each `it`, we make a call
// For example, in the “Go To Customer’s Page” step we will have :
testContext.addContextItem(this, 'testIdentifier', 'goToCustomersPage', baseContext);
// In the report, the final identifier will look like this: ‘functional_BO_customers_customers_filterAndQuickEditCustomers_goToCustomersPage’
```

Be careful, identifiers **must be unique** through the whole campaign ! We have a dedicated Github Action to help us find duplicates, so if you submit a PR we'll see it directly.

### Cleaning behind
You must be able to launch a test independently, as well as in a whole campaign. That means :

- Your test must create its own data or rely on the default fixtures
- Your test must clean behind itself in a reliable manner
- Deleting files (invoices, images) and artifacts

The shop must end in the same state it was in before your test, as much as possible (since some actions are logged and create artifacts, that may not be always easy to clean though) and let subsequent tests run smoothly! That means deleting the items you created, reverting your changes, etc.

A rule of thumb: can you launch your test suite multiple times? If yes, you know you’re not dependent on the data, and you’re properly cleaning behind.

## Data

### Demo Data
Our tests rely heavily on the demo fixtures (= demo data added when installing the vanilla PrestaShop package). However, we describe these data in separate files to make sure there’s no reference hard written in our code.

The only assumption we have to make is the presence of certain items like Orders or Products in the catalog after a vanilla installation.

If you need to rely on the fixtures too, make sure to use the description of the objects you’re looking for in the `data` folder. If it’s not complete, you can expand it and make a Pull Request, we’ll be happy to improve our datasets !

### Faker
When we need to create new items, we rely on [Faker](https://github.com/faker-js/faker) to create random data.  
This helps us make sure we’re testing with randomized sets of data and covering a lot of cases. It’s very important to check the specifications before to make sure you’re properly setting up your faker : input length, authorized characters, range of dates/values, etc.
