---
title: Inside the module
weight: 10
---

# Inside the module

This page should be useful for someone willing to contribute to the module. To do so he/she needs to understand the module logic and structure.


## Terminology

The following naming have been inspired by [Facets vs Filters](https://www.nngroup.com/articles/filters-vs-facets/).

### Facets and Filters

#### Filters

A filter is any assertion that can be used to filter a list of products and **does not contain logical operators** such as "and" or "or" when expressed in plain English.

For instance "Blue products" is a filter. "Red or blue products" is **not** a filter. It's a facet...

A Filter is represented by the `PrestaShop\PrestaShop\Core\Product\Search\Filter` class.

On front-office, user can see multiple blocks. Blocks are linked to a Filter and a population. The population is the products matching the filter.

#### Facets

A facet is a set of filters combined with logical operators.

For instance "Blue products or red products" is a facet.

Filters within a facet may be active or not, and are usually combined with the "or" operator even though it is defined by the implementation and not necessarily so. Still, there seems to be a strong UX convention that filters inside a facet are combined with "or", meaning for instance that if I check the "Blue" and the "Red" filter I won't get products that are both blue and red, but a mix of blue products and red products.

A facet is represented by the `PrestaShop\PrestaShop\Core\Product\Search\Facet` class. It is basically a collection of `Filter`s.

Under the hood, Facets have a complex data structure allowing deep queries OR and AND, under, equals, above... and at the end of the processing SQL queries are built from them to be run against the database.


## Exposed endpoints

The module

- is accessible from the front-office on dedicated pages, using hooks or widgets
- has a back-office configuration page
- provides 3 endpoints to be regularly visited (by a cron for example) in order to reindex the products attributes, prices and also clear the cache

The 3 exposed endpoints are in the root folder of the module.

Indexation results are stored in specific SQL tables. This allows to query flat tables ready for querying, instead of having complex SQL queries being fired at runtime when user is searching on front-office.


## Flow of the rendering process for displaying products on a category page

1. The core `CategoryController` executes a hook, searching for modules able to answer to a search request like "I need to fetch the products for the category with `id_category` === 4". See "How it's plugged on the Core" below.
2. A module (e.g. `ps_facetedsearch`) responds by returning an instance of a `ProductSearchProviderInterface` of its choosing
3. The `CategoryController` retrieves the `ProductSearchProviderInterface` returned by the module and uses it to get the products.
4. The search provider returns a `ProductSearchResult`, it contains:
    - the products (which may just be an array like `[['id_product' => 2], ['id_product' => 3]]` - the core will add the missing data)
    - the pagination information (total number of pages, total number or results, etc.) wrapped inside a `Pagination`
    - the new, updated filters
    - the sort options that are available to sort the list (array of `SortOrder`s)
5. The `CategoryController` hydrates the product list, formats it, renders it. It also renders the filters, the pagination, and the sort options (price ascending, etc.).

`ps_facetedsearch` module needs to provide two features:
- run a database query (internal or external database) that returns a list of product identifiers
- optionally (to provide nice URLs), encode and decode the filters in a way that fits inside a URL


### The `ProductSearchQuery` object

The `PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery` object holds all search query information.

This object contains:
- something that indicate modules where the query came from (`id_category`, `id_supplier` for `SupplierController` etc.). This is the minimal filter that the search module is supposed to implement.
- the `SortOrder` that is requested
- the `page` number that is requested
- the `resultsPerPage`, i.e. the number of products per page that is expected

### Post processing

After finding the population matching a filter, a post processing can be applied to alter the data in order to control how it is presented to user.

For example you might have a collection of prices ranging from 21.88 to 72.82 but this is not nice to display. So you can apply post processing to force the display to be a range from 0 to 100, although the data available goes from 21.88 to 72.82 .

### Caching

Filter results are cached inside SQL in order to improve performance. Same query being sent twice can then reuse the result from first fetch.


## Highlights of the `src` folder

### Specific hook structure

There were so many hooks used in the module that the hook actions have been moved outside of the main file, unlike many other modules. A hook dispatcher is in charge of linking the main module file and calling the right hooks. Hook actions will be found in `src/Hook`

### MySQL adapter

Inside `src/Adapter` is the code responsible for mapping faceted search queries to MySQL queries

### Copy-paste of the Core

Some of the code inside the module used to be inside the Core repository. It was extracted as it was useful only for the module and this avoids having different behaviors depending on which shop the module was installed.


## SQL naming

SQL tables are based on naming convention `layered` because this was the previous name of the module.


## How it's plugged on the Core, delegating search to modules

In order for modules to be able to replace the core search mechanism, `productSearchProvider` hook is used to look for alternative search providers.

The hook is executed with a `ProductSearchQuery $query` param, which allows modules to return an instance of a `ProductSearchProviderInterface` that is able to handle the query.

The comments written in `classes/controller/ProductListingFrontControllerCore` can provide more details.
