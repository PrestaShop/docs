---
title: Inside the module
weight: 30
---

# Inside the module

This page should be useful for someone willing to contribute to the module. To do so he/she needs to understand the module logic and structure.

## Exposed endpoints

The module

- is accessible from the front-office on dedicated pages, using hooks or widgets
- has a back-office configuration page
- provides 3 endpoints to be regularly visited (by a cron for example) in order to reindex the products attributes, prices and also clear the cache

The 3 exposed endpoints are in the root folder of the module.

Indexation results are stored in specific SQL tables. This allows to query flat tables ready for querying, instead of having complex SQL queries being fired at runtime when user is searching on front-office.

## Filter system

On front-office, user can see multiple blocks. Blocks are linked to a filter and the population. The population is the products matching the filter.

Blocks are what is the most expensive to generate. Each link is a query.

Filters have a complex structure allowing deep queries such as OR and AND, under, equals, above... and at the end of the processing SQL queries are built from them to be run against the database.

QUESTION: where are the Filters objects? they are arrays ?

### Post processing

After finding the population matching a filter, a post processing can be applied to alter the data in order to control how it is presented to user.

For example you might have a collection of prices ranging from 21.88 to 72.82 but this is not nice to display. So you can apply post processing to force the display to be a range from 0 to 100, although the data available goes from 21.88 to 72.82 .

### Caching

Filter results are cached inside SQL in order to improve performance. Same query being sent twice can then reuse the result from first fetch.


## Highlights of the `src` folder

### Specific hook structure

There were so many hooks used in the module that the hook actions have been moved outside of the main file, unlike many other modules. A hook dispatcher is in charge of linking the main module file and calling the right hooks. Hook actions will be found in `src/Hook`

### MysQL adapter

Inside `src/Adapter` is the code responsible for mapping faceted search queries to MySQL queries

### Copy-paste of the Core

Some of the code inside the module used to be inside the Core repository. It was extracted as it was useful only for the module and this avoids having different behaviors depending on which shop the module was installed.

## SQL naming

SQL tables are based on naming convention `layered` because this was the previous name of the module.

## How it's plugged on the Core

In the Core front controller ProductListingFrontController a hook is used to check whether a module can provide a SearchProvider. Faceted search module uses this hook to provide its SearchProvider and allow using it.
