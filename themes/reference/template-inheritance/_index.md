---
title: Template inheritance
aliases:
  - /themes/smarty/template-inheritance.html
---

# Template inheritance

PrestaShop 1.7 relies a lot on template inheritance in order to create the most consistant
theme possible while heavily reducing the amount of duplicated code.


## The principle

Template inheritance allow you to extend a parent template and only redefine the block you need.

The picture below illustrates the example of a specific product page extending a generic one. Say
you have three files: `product-pack.tpl` extending `product.tpl`, itself extending `page.tpl`.

{{< figure src="img/template-inheritance.png" title="Schema for template inheritance" >}}

The `product-pack.tpl` file will **only** contain the product description part. Everything else
will be exactly the same as product page. Even better, the product page will only define the main
content of the page, everything else will be taken from its own parent template (ie page.tpl).

The wrong way of doing this would be to extract header, footer and reusable part of the template
and _include_ them in each file.

The [official Smarty documentation](https://www.smarty.net/inheritance) has a nice and simple example. In their own words:

> Template inheritance is an approach to managing templates that resembles object-oriented programming techniques.
  Instead of the traditional use of {include ...} tags to manage parts of templates, you can inherit the
  contents of one template to another (like extending a class) and change blocks of content therein (like
  overriding methods of a class.) This keeps template management minimal and efficient, since each template
  only contains the differences from the template it extends.

## PrestaShop real life example

In a PrestaShop theme, many pages are very similar, for example template listing products: categories,
new products, search results, and so on. All of them display a list of products so in PS 1.7 they all
extend `catalog/listing/product-list.tpl` (which extends the main layout).

```smarty
  {extends file=$layout}

  {block name='content'}
    <section id="main">

      {block name='product_list_header'}
        <h2 class="h2">{$listing.label}</h2>
      {/block}

      {block name='product_list'}
        {include file='catalog/_partials/products.tpl' listing=$listing}
      {/block}

    </section>
  {/block}
```

The template will show a title and a list of products underneath. For category page, we want a nice
description with an cover image. So we can simply override the *product_list_header*

```smarty
  {extends file='catalog/listing/product-list.tpl'}

  {block name='product_list_header'}

    <h1>{$category.name}</h1>
    <div class="category-cover">
      <img src="{$category.image.large.url}" alt="{$category.image.legend}">
    </div>
    <div id="category-description">{$category.description nofilter}</div>

  {/block}
```

This reduce code to the minimum, without any repetition.
