---
title: Database
weight: 30
showOnHomepage: true
---

# Accessing the database

## The database structure

By default, PrestaShop’s database tables start with the `ps_` prefix. This can be customized during installation

{{% notice warning %}}
**Important**

For security reasons We strongly recommend to customize your database prefix instead of using the default one.
Changing it will help protect your shop against any attacks (some SQL injection for example) targeting the default table names

{{% /notice %}}

All table names are in lowercase, and words are separated with an underscore character (“_”):

* ps_employee
* ps_manufacturer
* ps_product
* ps_product_comment
* ps_shop_url

When a table establishes the links between two entities, the names of both entities are mentioned in the table’s name. For instance, `ps_category_product` links products to their category.

A few details to note about tables:

* Tables which contain translations must end with the `_lang` suffix. For instance, `ps_product_lang` contains all the translations for the `ps_product` table.
* Tables which contain the records linking to a specific shop must end with the `_shop` suffix. For instance, `ps_category_shop` contains the position of each category depending on the store.

There is also a couple of standard practices for data rows within a table:

* Use the `id_lang` field to store the language associated with a record.
* Use the `id_shop` field to store the store associated with a record.

## Accessing the database

The preferred way to access the database is through the [Db component][db-component].

[db-component]: {{< ref "../components/database/db" >}}
