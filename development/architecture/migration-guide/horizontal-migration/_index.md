---
title: How to migrate Back Office pages to Symfony horizontally
menuTitle: Horizontal migration guide
chapter: true
weight: 40
summary: "The guide we use to migrate pages to Symfony horizontally"
---

# How to migrate Back Office pages to Symfony horizontally

{{% notice note %}}
The horizontal migration strategy is still in progress, so docs may change slightly as it develops.
{{% /notice %}}

_Pick up a legacy page, refactor the code in a single layer to follow Symfony framework standards (depending on stage of migration it may be the `model`, `view` or a `controller`). When one layer is migrated in all the pages, then the whole layer of legacy code can be deleted_.

For more information about the `horizontal` migration you can refer to the [ADR](https://github.com/PrestaShop/ADR/blob/master/0018-horizontal-migration.md) and the [blog post](https://build.prestashop-project.org/news/introducing-horizontal-migration/).

## Contents of this guide

{{% children %}}

