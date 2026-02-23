---
title: Listing pages
weight: 3
---

# Listing pages

This page covers how PrestaShop handles product listing pages and how the product list updates dynamically via AJAX.

Any page that displays a list of products — category, search results, new products, best sellers, etc. — uses the same listing system. They all share the same base template (`catalog/listing/product-list.tpl`) and receive the same `$listing` variable from their controller. Specific pages extend the base template and override only what differs.

See [Template inheritance]({{< relref "/9/themes/concepts/templates/template-inheritance" >}}) for a real-world example.

## The `$listing` variable

All listing controllers provide the same `$listing` variable to the template. It contains everything needed to render the product list:

| Key | Description |
|-----|-------------|
| `$listing.label` | Page title (e.g., category name, "Search results") |
| `$listing.products` | Array of product data |
| `$listing.pagination` | Pagination info (total, pages, current page) |
| `$listing.sort_orders` | Available sort options |
| `$listing.sort_selected` | Currently active sort option |
| `$listing.facets` | Faceted search filters (when a filter module is active) |

## Sub-templates

The product list area is split into three sub-templates, each wrapped in a container with a specific ID:

| Template | Container ID | Content |
|----------|-------------|---------|
| `catalog/_partials/products-top.tpl` | `#js-product-list-top` | Sort options, result count, display mode |
| `catalog/_partials/products.tpl` | `#js-product-list` | The product grid/list itself |
| `catalog/_partials/products-bottom.tpl` | `#js-product-list-bottom` | Pagination |

This separation exists because of how AJAX updates work (see below).

## AJAX page updates

When customers change sort order or paginate, PrestaShop updates the product list **without a full page reload**. Filter modules (like `ps_facetedsearch`) also use this same system to refresh results dynamically.

A key design decision: PrestaShop renders the updated HTML **server-side** and sends it back to the theme. The theme's JavaScript only needs to replace DOM placeholders — it does not need to parse JSON and reconstruct markup. This ensures no presentation logic is duplicated between Smarty and JavaScript.

### How it works

1. The customer interacts with a sort, pagination, or filter option.
2. `core.js` intercepts the action and sends an AJAX request to the server.
3. The server re-renders the sub-templates.
4. PrestaShop emits the `updateProductList` event with the rendered HTML.
5. Your theme replaces the corresponding DOM elements.

### Handling the event

```js
if (typeof prestashop !== 'undefined') {
  prestashop.on('updateProductList', (data) => {
    updateProductListDOM(data);
  });
}

function updateProductListDOM(data) {
  document.querySelector('#js-product-list-top').replaceWith(data.rendered_products_top);
  document.querySelector('#js-product-list').replaceWith(data.rendered_products);
  document.querySelector('#js-product-list-bottom').replaceWith(data.rendered_products_bottom);
}
```

| `data` property | Contains |
|-----------------|----------|
| `rendered_products_top` | Sort bar and result count HTML |
| `rendered_products` | Product grid/list HTML |
| `rendered_products_bottom` | Pagination HTML |
| `rendered_facets` | Filter sidebar HTML (when a filter module is active) |
| `rendered_active_filters` | Active filter tags HTML (when a filter module is active) |

{{% notice warning %}}
If you change the container IDs (`#js-product-list`, `#js-product-list-top`, `#js-product-list-bottom`) in your templates, make sure your JavaScript targets the new IDs — otherwise AJAX updates will silently fail.
{{% /notice %}}

See [JavaScript events]({{< relref "/9/themes/reference/javascript-events" >}}) for the full list of core events.
