---
title: Setup routing
weight: 60
---

# Setup routing

We will put the routing in a separate file for each controller. The path of the files also follow the menu path

Retake our example:

> Example: Configure > Shop Parameters > Clients > Title
>

> Then you will put the new Routing file, in `src/PrestaShopBundle/Resources/config/routing/configure/shop_parameters/`
>

The name of the routing file will be the English name of the page you want to migrate

> Example: Title, so your routing file name will be `title.yml`
>

At Prestashop, we use the YAML to configure route
