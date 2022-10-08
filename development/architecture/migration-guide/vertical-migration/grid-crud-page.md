---
title: Grid / CRUD
weight: 50
---

# How to migrate a Grid/CRUD page

In PrestaShop's Back Office, most of the pages are organized the same way.

We can already see 2 categories of pages that represent almost 90% of back office:

* **Configuration** pages: forms that alter the configuration;
* **CRUD** pages: pages with a filterable/searchable table of data and some options to access a form of creation/edition;

CRUD pages provide a lot of features.

Access to a lot of data, ordered by column: this data can be simple (text) or more complex (display a thumbnail).
These columns are ordered and can be altered by developers: we can change position, add or remove columns for instance.

All tables are paginated and can be filtered by value for a specific column, for instance re-organize the value ordered by decreasing price.

Furthermore, all tables can be filtered using criteria: every column is a criterion and may be used to build the data.

Finally, all tables are provided with common actions: export, access to SQL manager, ... and common bulk actions.

In PrestaShop, all grids in modern CRUD pages are managed by the [Grid component][grid-component].

[grid-component]: {{< ref "/8/development/components/grid/" >}}
