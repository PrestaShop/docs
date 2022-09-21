---
title: How to execute UI Tests
menuTitle: Executing UI tests
weight: 10
---

# How to execute UI Tests

This is thoroughly explained in [README](https://github.com/PrestaShop/PrestaShop/blob/develop/tests/UI/README.md) in the `tests/UI` folder. 
You'll need a working installation of PrestaShop in order to run the tests.

## How to execute specific tests

If you want to run only one test from a campaign or a couple of tests in the same folder, you can use `test:specific` command.

To specify which test to run, you can add the `TEST_PATH` parameter in the beginning of the command

```bash
# To run the **Filter Products** test from sanity campaign
TEST_PATH="sanity/02_productsBO/01_filterProducts" URL_FO="https://domain.tld/" npm run test:specific
# To run all **Products BO** tests 
TEST_PATH="sanity/02_productsBO/*" URL_FO="https://domain.tld/" npm run test:specific
```