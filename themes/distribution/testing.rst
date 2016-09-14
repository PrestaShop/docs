Testing
===================

What make a theme valid
-----------------------------------------

When you're trying to select a theme in the backoffice, PrestaShop will test if your theme is valid. It
won't install if the theme isn't valid.

A theme is valid if it contains some files and some configuration keys.

Required files
~~~~~~~~~~~~~~~~~~

Here is the complete list of required files:

* preview.png
* config/theme.yml
* assets/js/theme.js
* assets/css/theme.css
* templates/_partials/form-field.tpl
* templates/catalog/product.tpl
* templates/catalog/listing/product-list.tpl
* templates/checkout/cart.tpl
* templates/checkout/checkout.tpl
* templates/cms/category.tpl
* templates/cms/page.tpl
* templates/customer/address.tpl
* templates/customer/addresses.tpl
* templates/customer/guest-tracking.tpl
* templates/customer/guest-login.tpl
* templates/customer/history.tpl
* templates/customer/identity.tpl
* templates/index.tpl
* templates/customer/my-account.tpl
* templates/checkout/order-confirmation.tpl
* templates/customer/order-detail.tpl
* templates/customer/order-follow.tpl
* templates/customer/order-return.tpl
* templates/customer/order-slip.tpl
* templates/errors/404.tpl
* templates/errors/forbidden.tpl
* templates/checkout/cart-empty.tpl
* templates/cms/sitemap.tpl
* templates/cms/stores.tpl
* templates/customer/authentication.tpl
* templates/customer/registration.tpl
* templates/contact.tpl

Required configuration keys
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Your configuration file ``config/theme.yml`` (:doc:`read more about this file <../gettingstarted/theme-yml>`)
must details some configuration keys.

Here is the list of keys PrestaShop will look for. The dot represent the nesting.

* name
* display_name
* version
* author.name
* meta.compatibility.from
* meta.available_layouts
* global_settings.image_types.cart_default
* global_settings.image_types.small_default
* global_settings.image_types.medium_default
* global_settings.image_types.large_default
* global_settings.image_types.home_default
* global_settings.image_types.category_default
* theme_settings.default_layout


How to use PrestaShop Automated Test Suite
-----------------------------------------

PrestaShop 1.7 comes with an automated test suite used to develop Classic. You should use them
to ensure your theme is fully compatible with PrestaShop's feature.

You need ``nodejs``, ``npm``, ``java`` and Chrome installed on your machine.

.. warning::
  The test suite is **destructive**. Do not run it in production.

Prepare your store for the tests:

#. ``cd tests/Selenium``
#. ``npm install``
#. Install PrestaShop, preferably with 2 languages (though tests should ideally be language and settings agnostic)
#. Copy ``tests/Selenium/settings.dist.js`` to ``tests/Selenium/settings.js`` and customize according to your setup
#. Once PrestaShop is installed, run ``php prepare-shop.php``. **WARNING: never do this on a production shop because it will edit existing products without asking for your permission.**

The test suite uses Selenium,

``webdriver.io`` allows you to perform almost any action a browser would do using a fluent promise-based API.
You will need some familiarity with promises to make the most of the tool.


Add a new test
-----------------------------

If you want to create a custom test, there are a few things you should know. Tests are contained in
the ``specs`` subfolder.

Until we can do more documentation, please have a look at the existing tests and at the
`WebDriver.io API`_.

If you need to add general purpose helper functions for your tests, they should go in ``commands/init.js``.

If you need fixtures for your tests, please use the ones from the default installation or provide a script
that installs them.

Do not hard-code things such as product ids in your tests: instead abstract them behind a name and put
them in the ``fixtures.js`` file.


.. _WebDriver.io API: http://webdriver.io/api.html
