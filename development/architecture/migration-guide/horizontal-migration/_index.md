---
title: How to migrate Back Office pages to Symfony horizontally
menuTitle: Horizontal migration guide
chapter: true
weight: 40
summary: "The guide we use to migrate pages to Symfony horizontally"
---

# How to migrate Back Office pages to Symfony horizontally

_Pick up a legacy page in Back Office, refactor code targeting only one layer to follow Symfony framework standards (depending on stage of migration it may be the `controller`, `view`, `form` or a `CQRS` layer). When one layer is migrated in all the pages, then the related legacy code can be deleted_.

For more information about the `horizontal` migration you can refer to the [ADR](https://github.com/PrestaShop/ADR/blob/master/0018-horizontal-migration.md) and the [blog post](https://build.prestashop-project.org/news/introducing-horizontal-migration/).

## Contents of this guide

{{% children %}}

