---
title: A small tour
weight: 205
---

# A small tour of the software

This page attempts to guide newcomers in PrestaShop and show them how to navigate in the software.

Note that a live demo is availalbe on [demo.prestashop.com](https://demo.prestashop.com/).

## Front office MVC

The Front Office is a small application being powered by PHP and Smarty.

The backend relies on controllers you can find in directory `controllers/front`
and PrestaShop classes that contain the business logic, mainly from `classes` folder.

The views and the Javascript come from the installed theme that you will find in `themes/`. You can have multiple themes available on a shop but only one is enabled and in use.

### Visit a Front controller

When you visit `/` on your shop you are being returned the Homepage.

What happened behind the scenes is that

1. Your HTTP request hit the `index.php` main routing file that relies on the _Dispatcher_
2. The Dispatcher found the right Front controller ; the `IndexController`
3. The `IndexController` calls the `index` Smarty view to be rendered, populated with PHP objects

If you send another HTTP request, the same sequence will happen
- Dispatcher finds the right Front controller
- Front controller builds the right response using a Smarty template and relying on PrestaShop business logic

## Back office MVC

The Back Office is a large application being powered by PHP and Smarty for the legacy part and by PHP, Symfony and Twig for the migrated part.

The legacy backend relies on controllers you can find in directory `controllers/admin`
and PrestaShop classes that contain the business logic, mainly from `classes` folder.

For legacy pages, the views and the Javascript can be found in `admin-dev/themes/default`.

The Symfony backend relies on controller you can find in `src/PrestaShopBundle/Controller/Admin` and PrestaShop logic that mostly come from `src` folder, and also some `classes` files.

For migrated pages, the views can be found in `src/PrestaShopBundle/Resources/views`.
The Javascript can be found in `admin-dev/themes/new-theme/js`.

### Visit a legacy Back Office controller

When you visit `/admin-{xxx}/index.php?controller=AdminCarriers&token={yyy}` on your shop you are being returned the Carriers Back Office page.

What happened behind the scenes is that

1. Your HTTP request hit the `/admin-{xxx}/index.php` Back Office routing file. This file detected no Symfony route matches your request so it relied on the _Dispatcher_ to handle your query.
2. The Dispatcher found the right Back Office controller ; the `AdminCarriersController`
3. The Admin controllers use a generic system to choose what Smarty template use. Generic templates to display forms and listings are available and the controller provides the structure configuration (for example it controls what columns and rows are displayed).

### Visit a migrated Back Office controller

When you visit `/admin-{xxx}/index.php/configure/shop/preferences/preferences?_token={yyy}` on your shop you are being returned the Preferences Back Office page.

What happened behind the scenes is that

1. Your HTTP request hit the `/admin-{xxx}/index.php` Back Office routing file. This file booted the Symfony the kernel to handle your request.
2. Symfony found the right Back controller, matching your URL ; the `PreferencesController`
3. The PreferencesController calls the `@PrestaShop/Admin/Configure/ShopParameters/preferences.html.twig` Twig view to be rendered, populated with PHP objects

If you send another HTTP request, the same sequence will happen
- Symfony finds the right Back controller
- Symfony controller builds the right response using a Twig template and relying on PrestaShop business logic, organized either as Symfony services or using PrestaShop singleton
