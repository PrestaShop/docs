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
Introducing a framework was decided in order to eventually get rid of the “home-made framework” part of the application, and most notably of its maintenance workload, which consumes too much time and is not our core business features.
Using a proven and popular open-source framework allows focusing on core business code with greater efficiency, while enjoying the stability of a globally recognized framework. For more details, you can refer to [a blog post about the introduction of Symfony migration](https://build.prestashop-project.org/news/prestashop-1-7-and-symfony).

## What kind of pages?
In the end all the pages in Back Office are expected to be migrated. All of them can be classified in four categories, depending on their purpose:

1. [Configuration / Settings Form pages]({{< ref "/8/development/architecture/migration-guide/vertical-migration/forms/settings-forms.md" >}})

   These pages allow the user to modify configuration settings in PrestaShop.

2. [Listing pages]({{< ref "/8/development/components/grid/" >}})

   These pages allow the user to browse PrestaShop content using listings. These listings usually provide some actions the user can trigger, such as "enable/disable", "delete", "bulk delete".

3. [Add/Edit Form pages]({{< ref "/8/development/architecture/migration-guide/vertical-migration/forms/crud-forms.md" >}})

   These pages allow the user to create or edit records from PrestaShop data model (example: create/edit customers).

4. Other pages

   There are some pages that are unique: Carriers Edit page, Dashboard, Customer Service page ...

{{% notice note %}}
Sometimes a page will have mixed content. For example there are pages that provide two listings or one listing and one configuration form.
{{% /notice %}}

## How?

No matter what kind of page it is, it will always have the 3 main layers from the legacy [MVC PrestaShop architecture]({{< ref "/8/basics/introduction.md" >}}): `model`, `view` and `controller`.

Since 2015 (PrestaShop 1.7) the Back Office pages were migrated [vertically]({{< ref "/8/development/architecture/migration-guide/vertical-migration/_index.md" >}}), which means, that all these layers are migrated together `page by page`. (_migrate model, view and a controller of one page and only then proceed to another page_).

In 2022 (PresaShop 8.0) a new idea was born and a new [horizontal migration]({{< ref "/8/development/architecture/migration-guide/horizontal-migration/_index.md" >}}) approach was introduced, which should allow migrating `layer by layer` (_migrate controllers for all the pages, then all the views and finally all the models_).

{{% notice note %}}
Consult with PrestaShop core developers to decide which method is more suitable for certain page before migrating it.
{{% /notice %}}

## Contents of this guide

{{% children %}}

[form-pages]: {{< ref "/8/development/architecture/migration-guide/vertical-migration/forms/settings-forms.md" >}}
