---
title: Router and Dispatcher component
menuTitle: Router and Dispatcher
---

# Router and Dispatcher

The legacy Dispatcher and the Symfony Router are in charge of parsing incoming HTTP requests and finding the right Controller to return HTTP response.

### Front office routing

The Front office controllers lie in the `controllers/front` directory.

The Dispatcher matches a given HTTP request with a Front Office controller.

When you visit `/` on your shop, you are being returned the Homepage unless you have your shop installed in a subdirectory, then `/your_subdirectory` is your Homepage.

What happened behind the scenes is that:

1. Your HTTP request hit the `index.php` main routing file that relies on the _Dispatcher_
2. The Dispatcher found the right Front controller - the `IndexController`
3. The `IndexController` calls the `index` Smarty view to be rendered, populated with PHP objects

If you send another HTTP request, the same sequence will happen
- Dispatcher finds the right Front controller
- Front controller builds the right response using a Smarty template and relying on PrestaShop business logic

## Back office routing

The Back Office is split between the legacy part and the migrated part.

The legacy backend relies on controllers you can find in the `controllers/admin` directory.

The Symfony backend relies on controllers you can find in `src/PrestaShopBundle/Controller/Admin`.

The Back Office routing matches a given HTTP request with a Controller.

### Legacy Back Office routing

When you visit `/admin{x}/index.php?controller=AdminCarriers&token={y}` on your shop, PrestaShop returns the Carriers Back Office HTML page.

What happened behind the scenes is that:

1. Your HTTP request hit the `/admin-{xxx}/index.php` Back Office routing file. This file detected no Symfony route matches your request so it relied on the _Dispatcher_ to handle your query.
2. The Dispatcher found the right Back Office controller - the `AdminCarriersController`
3. The Admin controllers use a generic system to choose what Smarty template use. Generic templates to display forms and listings are available and the controller provides the structure configuration (for example it controls what columns and rows are displayed).

### Migrated Back Office routing

When you visit `/admin-{xxx}/index.php/configure/shop/preferences/preferences?_token={yyy}` on your shop PrestaShop returns the Preferences Back Office HTML page.

What happened behind the scenes is that:

1. Your HTTP request hit the `/admin-{xxx}/index.php` Back Office routing file. This file booted the Symfony kernel to handle your request.
2. Symfony found the right Back Office controller, matching your URL, the `PreferencesController`
3. The PreferencesController calls the `@PrestaShop/Admin/Configure/ShopParameters/preferences.html.twig` Twig view to be rendered, populated with PHP objects

If you send another HTTP request, the same sequence will happen
- Symfony finds the right Back Office controller
- Symfony controller builds the right response using a Twig template and relying on PrestaShop business logic, organized either as Symfony services or using PrestaShop singleton

## Module routing

See [the Module Controllers page section]({{< ref "/1.7/modules/concepts/controllers/" >}})
