---
title: Listing pages
weight: 40
aliases:
  - /themes/templates/100-listing.html
---

# Listing pages

Your catalog is mostly 2 things: a list of products and a detailed product page.

This section covers the listing pages, which includes: category, search result,
products per brand, best seller list, new product list and so on.

In order to reduce code duplication, the only necessary template is the file
`catalog/listing/product-list.tpl`.


## Extending product-list template

We already covered [how PrestaShop chooses the right template to use]({{< ref "templates-layouts" >}})
so we know that the category template extends the product-list template.

We already covered how the [template inheritance]({{< ref "1.7/themes/reference/template-inheritance/" >}}) allows you to redefine only a
small part of bigger template.

So basically you are all set to create a category template or a search result template
that make much more than the product-list template!


## AJAX page update

Your product list will change as the customer filters the result with
faceted navigation or sorting options for instance.

One of the golden rule of PrestaShop 1.7 is: **No presentation code duplication**.
Hence we didn't want to return json data about the result and let javascript
reconstitute the page.

We made the core generate the sub template part and return it to the client. In the
end javascript is only used to replace the content of HTML placeholders.

Each ajax call will regenerate the following templates:

* `catalog/_partials/products-top.tpl`
* `catalog/_partials/products.tpl`
* `catalog/_partials/products-bottom.tpl`

### How to update the view

PrestaShop will emit JavaScript events to let you know what to do something.

Example:

```js
import $ from 'jquery';
import prestashop from 'prestashop';
import 'velocity-animate';

$(document).ready(() => {
  prestashop.on('updateProductList', (data) => {
    updateProductListDOM(data);
  });
});

function updateProductListDOM (data) {
  $('#search_filters').replaceWith(data.rendered_facets);
  $('#js-active-search-filters').replaceWith(data.rendered_active_filters);
  $('#js-product-list-top').replaceWith(data.rendered_products_top);
  $('#js-product-list').replaceWith(data.rendered_products);
  $('#js-product-list-bottom').replaceWith(data.rendered_products_bottom);
}
```
