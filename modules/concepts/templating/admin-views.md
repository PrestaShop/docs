---
title: How to override Back Office views
menuTitle: Overriding Back office views
weight: 4
---

# How to override Back Office views
{{< minver v="1.7.3" title="true">}}

Since PrestaShop 1.7, the back office is being progressively migrated to the Symfony framework. Even though modules are no longer allowed to override a complete controller like before (it was highly discouraged anyway), we have introduced new powerful and more efficient ways to customize the Back Office.

As part of this migration, PrestaShop is switching its templating engine from Smarty to [Twig](https://twig.symfony.com/). Twig is very popular in the PHP/Symfony world, it's well-documented and it's also one of the most efficient engines out there.

This means that once all the pages have been migrated, the whole Back Office will be Twig-based. This engine has allowed us to enable some powerful new features for module developers on modern pages. 

## Override templates

Let's say we want to improve the Product Listing page of the back office.

Our Customer want a better Listing view: the "Price" column should be at position 2 and the "Reference" column to be removed. How can we do that? It's quite simple.

### Identify the template to override

First we need to identify which Twig template(s) is (are) rendered. Using the *Debug mode*, select the "Twig metrics" block in the Symfony Debug toolbar. You'll see the list of Twig templates used to render the page. In our case, we are interested in the template "**@PrestaShop/Admin/Product/CatalogPage/catalog.html.twig**".

### Override the template in the module: a simple "Hello world!"

Now we have found the right template, let's override it inside a module.
In a module called `foo` let's create the related template. As the template is located inside the `PrestaShop/Admin/Product/CatalogPage` folder, we need to create the same path.

So Let's create a file named `catalog.html.twig` in the `modules/foo/views/PrestaShop/Admin/Product/CatalogPage/catalog.html.twig` folder: we could re-use the one in the `src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage` folder, but let's start with a very simple override.

Note that we use `@!PrestaShop` instead of `@PrestaShop` to be sure we extend the original file.

```twig
{% extends '@!PrestaShop/Admin/Product/CatalogPage/catalog.html.twig' %}

{% block product_catalog_filters %}
  Hello world!
{% endblock %}
```

If your module is compatible with PrestaShop 8.0 or above, you can use the new namespace `@PrestaShopCore` instead of `@!PrestaShop` to make it even clearer that you're extending the original file.

![Override all the things](../img/bo-override-1.png)

Access the product Listing page and "voila", we have overridden the filter block. Now we can adapt it to remove "Reference" column. For instance, remove "Reference" and "Search Ref." table headers, and we should have this view:

![Almost there](../img/bo-override-2.png)

Well, it's not that good... it's because the columns are also rendered by the template `list.html.twig`. We must override it to remove the "Reference" column.

Let's create the file named `list.html.twig` in the `modules/foo/views/PrestaShop/Admin/Product/CatalogPage/Lists` folder with the content of original block `product_catalog_form_table_row` located in the `src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/Lists` folder.

We only have to remove the "Reference" row in this template and we are good.

![Looking good](../img/bo-override-3.png)
