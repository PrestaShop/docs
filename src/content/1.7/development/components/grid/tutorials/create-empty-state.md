---
title: How to create an Empty state
menuTitle: Empty state
weight: 10
---

# How to create an Empty state
{{< minver v="1.7.6" title="true" >}}

Grid component allows developer to configure Empty state to make empty grid look more appealing for user.

## Creating an Empty state

By default, when Grid is empty user sees it as:

{{< figure src="../../img/empty_grid.png" title="Empty Suppliers grid" >}}

Unfortunately, it's not very engaging, so let's create Empty state for it! There are a few steps you have to follow:

1. You have to create a template for it and put it in `src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/EmptyState` directory, so Grid component can locate it.
2. Your Empty state template must be named after Grid id (e.g. if your Grid's ID is `supplier` then template name must be `supplier.html.twig`).

In Empty state template you can put whatever you want to: an image, some helpful text, a form ... but it's a good practice to describe what data grid displays. See Suppliers grid empty state as an example below.

{{< figure src="../../img/empty_state.png" title="Empty state in Suppliers grid" >}}

{{% notice note %}}
If your Grid does not define it's own Empty state template, then it uses `_default.html.twig` template that can be found at `src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/EmptyState`.
{{% /notice %}}
