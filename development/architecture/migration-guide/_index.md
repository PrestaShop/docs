---
title: How to migrate Back Office pages to Symfony
menuTitle: Migration guide
chapter: true
weight: 40
summary: "The guide we use to migrate pages to Symfony"
---

# Migrating Back Office pages to Symfony

_From the old and very specific PrestaShop codebase, to a modern and well-known Symfony framework_

## Why?
It helps following better practices and reduces the urge for developers to learn about the very specific PrestaShop codebase, while introducing the ability to attract more developers, that are already familiar with the well-known Symfony framework. For more details, you can refer to [a blog post about the introduction of Symfony migration](https://build.prestashop-project.org/news/prestashop-1-7-and-symfony).

## How?
Migrating a legacy page in PrestaShop requires working on three parts of the application: `templates`, `forms` and `controllers`.

Since 2015 (PrestaShop 1.7) the Back Office pages were migrated `vertically`, meaning that all the parts fo the application must have been fully migrated together `page by page`.
In 2022 (PresaShop 8.0) a new idea was born and a new `horizontal` migration approach was introduced, which should allow migrating `layer by layer` (e.g. migrate all the controllers, then all the forms, and then all the templates). For more information about the `horizontal` migration you can refer to the [ADR](https://github.com/PrestaShop/ADR/blob/master/0018-horizontal-migration.md) and the [blog post](https://build.prestashop-project.org/news/introducing-horizontal-migration/).

{{% notice note %}}
Consult with PrestaShop core developers to decide which method is more suitable for certain page before migrating it.
{{% /notice %}}

## Contents of this guide

{{% children %}}
