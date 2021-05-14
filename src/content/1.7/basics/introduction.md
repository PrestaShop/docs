---
title: Introduction
weight: 5
---

# Fundamentals of PrestaShop Development

PrestaShop was conceived so that third-party modules could easily build upon its foundations, making it an extremely customizable e-commerce software.

PrestaShop’s customization is based on three possibilities:

* Themes,
* Modules,
* Overriding.

Themes are explored in full in the Designer Guide.

Modules and the override system are explored in this Developer Guide, starting with the “Concepts” section below. You can learn more about each in the following chapters:

{{% notice note %}}
By default, PrestaShop is provided with more than 100 modules, enabling you to launch your online business quickly and for free.

More than 3000 modules are also available [on the Addons marketplace](https://addons.prestashop.com/en/2-modules-prestashop). These additional modules were built by the PrestaShop company or members of the PrestaShop community, and are sold at affordable prices. As a developer, you can also share your modules on this site, and receive 70% of the amounts associated with the sale of your creations. [Sign up now!](https://auth.prestashop.com/en/register?lang=en)
{{% /notice %}}

## Concepts

You should be familiar with PHP and Object-Oriented Programming before attempting to write your own module.

You can learn PHP here:

* [Getting started on PHP documentation](https://www.php.net/manual/en/getting-started.php)
* [Learning PHP on CodeCademy](https://www.codecademy.com/catalog/language/php)

You can learn Object-Oriented programming here:

* [Object-oriented programming on Wikipedia](https://en.wikipedia.org/wiki/Object-oriented_programming)
* [Object oriented php for beginners](https://net.tutsplus.com/tutorials/php/object-oriented-php-for-beginners/)

A module is an extension to PrestaShop that enables any developer to add the following:

* Provide additional functionality to PrestaShop.
* View additional items on the site (product selection, etc.).
* Communicate with other e-commerce services (buying guides, payment platforms, logistics, etc.).

Overriding is a system in itself. PrestaShop uses completely object-oriented code. One of the advantages of this is that, with the right code architecture, you can easily replace or extend parts of the core code with your own custom code, without having to touch the core code. Your code thus overrides the core code, making PrestaShop behave as you prefer it to. It is not recommended to use an override in a module that you intend to distribute (for instance through the PrestaShop Addons marketplace), and they are forbidden in partner modules. Keep them for your own shop.

## PrestaShop’s technical architecture

## MVC as the root

Until PrestaShop 1.6, PrestaShop was based on a 3-tier architecture:

* Object/data. Database access is controlled through files in the “classes” folder.
* Data control. User-provided content is controlled by files in the root folder.
* Design. All of the theme’s files are in the “themes” folder.

This is the same principle as the [Model>View>Controller (MVC) architecture](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller), only in a simpler and more accessible way.

A 3-tier architecture has many advantages:

* It’s easier to read the software’s code.
* Developers can add and edit code faster.
* Graphic designer and HTML integrators can work with the confines of the /themes folder without having to understand or even read a single line of PHP code.
* Developers can work on additional data and modules that the HTML integrators can make use of.

#### Model
A model represents the application’s behavior: data processing, database interaction, etc.

It describes or contains the data that have been processed by the application. It manages this data and guarantees its integrity.

#### View
A view is the interface with which the user interacts.

Its first role is to display the data that has been provided by the model. Its second role is to handle all the actions from the user (mouse click, element selection, buttons, etc.), and send these events to the controller.

The view does not do any processing; it only displays the result of the processing performed by the model, and interacts with the user.

#### Controller
The Controller manages synchronization events between the Model and the View, and updates both as needed. It receives all the user events and triggers the actions to perform.

If an action needs data to be changed, the Controller will “ask” the Model to change the data, and in turn the Model will notify the View that the data has been changed, so that the View can update itself.

## Moving forward with Symfony

While all versions of PrestaShop up to 1.6 took pride in only using a custom architecture, it was decided to incorporate the [Symfony PHP framework](https://symfony.com/) starting with PrestaShop 1.7.

The driving idea is that we want our code to be more robust, more modular, and fully testable. The 1.6 architecture, inherited from version 1.5 and years of PrestaShop development, is not getting any younger, and its age is really starting to show.

Using a proven and popular open-source framework will allow us to focus on our core business code (managing a cart, handling orders, calculating prices and taxes, generating invoices, etc.) with greater efficiency, while enjoying the stability of a globally recognized framework.

In the documentation, we will refer to the 1.6 framework as the "legacy" framework, as this is a popular [designation](https://en.wikipedia.org/wiki/Legacy_system) used in the software world.

## How it is built inside

Here is a small guide to help you navigate in the software.

Note that a live demo is available on [demo.prestashop.com](https://demo.prestashop.com/).

### Front office MVC

The Front Office is a small application being powered by PHP and Smarty.

The backend relies on controllers you can find in directory `controllers/front`
and PrestaShop classes that contain the business logic, mainly from `classes` folder.

The views and the Javascript comes from the installed theme that you will find in `themes/`. You can have multiple themes available on a shop but only one is enabled and in use.

### Visit a Front controller

When you visit `/` on your shop you are being returned the Homepage.

The HTTP request you sent was received by the _Dispatcher_ which found the right Front controller (the `IndexController` for Homepage).

This `IndexController` returned a HTTP response containing a HTML document rendered by Smarty.

## Back office MVC

The Back Office is a large application being powered by PHP and Smarty for the legacy part and by PHP, Symfony and Twig for the migrated part.

The legacy backend relies on controllers which you can find in directory `controllers/admin`. It also relies on PrestaShop classes that contain the business logic, mainly from `classes` folder.

For legacy pages, the views and the Javascript can be found in `admin-dev/themes/default`.

The Symfony backend relies on controller you can find in `src/PrestaShopBundle/Controller/Admin` and PrestaShop logic that mostly come from `src` folder, and also some `classes` files.

For migrated pages, the views can be found in `src/PrestaShopBundle/Resources/views`.
The Javascript can be found in `admin-dev/themes/new-theme/js`.

### Visit a legacy Back Office controller

When you visit `/admin{x}/index.php?controller=AdminCarriers&token={y}` on your shop you are being returned the Carriers Back Office page.

The HTTP request you sent was received by the Back Office _Dispatcher_ which found the right Admin controller (the `AdminCarriersController`).

This `AdminCarriersController` returned a HTTP response containing a HTML document rendered by Smarty.

The Admin controllers use a generic system to choose what Smarty template use. Generic templates to display forms and listings are available and the controller provides the structure configuration (for example it controls what columns and rows are displayed).

### Visit a migrated Back Office controller

When you visit `/admin-{xxx}/index.php/configure/shop/preferences/preferences?_token={yyy}` on your shop you are being returned the Preferences Back Office page.

The HTTP request you sent was received by the Symfony the kernel that handled your request.

Symfony found the right Back controller, matching your URL, the `PreferencesController`.

The `PreferencesController` returned a HTTP response containing a HTML document rendered by Twig.

