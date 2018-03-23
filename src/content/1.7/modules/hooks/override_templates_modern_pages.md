---
title: How to override templates in modern Back Office modern pages?
weight: 4
---

# How to override templates in modern Back Office modern pages?

Since v1.7 of PrestaShop, back office is progressively migrated to Symfony framework. If we are not allowed to override a complete controller like we could do before (even if it was highly discouraged), we have introduced so many powerful and efficient ways to customize the Back Office.

Together, let's see how we can improve the shops.

## Override the templates

Since PrestaShop 1.7, the new views are using [Twig](https://twig.symfony.com/) instead of Smarty as main templating engine. Twig is very popular in PHP world, well documented and one of the most performants.

Let's say we want to improve the Product Listing page of the back office.

Our Customer want a better Listing vieew: the "Price" column should be at position 2 and the "Reference" column to be removed. How can we do that? It's quite simple.

### Identify the template to override

First we need to identify which Twig template(s) is (are) rendered. Using the *Debug mode*, select the "Twig metrics" block in the Symfony Debug toolbar. You'll see the list of Twig templates used to render the page. In our case, we are interested by the template "**@PrestaShop/Admin/Product/catalog.html.twig**".

### Override the template in the module: a simple "Hello world!"

Now we have found the right template, let's override it inside a module.
In a module called `foo` let's create the related template. As the template is located inside `PrestaShop/Admin/Product` folder, we need to create the same path.

So Let's create a file named `catalog.html.twig` in `modules/foo/views/PrestaShop/Admin/Product` folder: we could re-use the one in `src/PrestaShopBundle/Resources/views/Admin/Product` folder, but let's start with a very simple override.

```twig
{% extends '@PrestaShop/Admin/layout.html.twig' %}
{% block content %}
    Hello world!
{% endblock %}
```

![Imgur](https://i.imgur.com/e5CDa7c.png)

Access the product Listing page and "voila", we have overriden the complete page. Now we can re-use the real `catalog.html.twig` template and adapt it to remove "Reference" column. For instance, remove "Reference" and "Search Ref." table headers, and we should have this view:

![Imgur](https://i.imgur.com/kaIsXNT.png)

Well, it's not that good... it's because the columns are also rendered by the template `list.html.twig`. We must override it to remove the "Reference" column.

Let's create the file named `list.html.twig` in `modules/foo/views/PrestaShop/Admin/Product` folder with the content of original template located in `src/PrestaShopBundle/Resources/views/Admin/Product` folder.

We only have to remove the "Reference" row in this template and we are good.

![Imgur](https://i.imgur.com/FAIg8ac.png)