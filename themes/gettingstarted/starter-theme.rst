Starter Theme
========================

PrestaShop 1.7 introduces a new way for designers to create their theme from scratch: the Starter Theme.
The default theme for PS 1.7 is based on the Starter Theme.

For pretty much every CMS, the default theme is used as a framework to build custom theme: designers have
to rework the default theme and reshape it into what they want to display. Sometimes that means having to
spend a lot of time removing all the CSS rules and JavaScript code from the default theme, and rewriting
everything. This means a LOT of work before even starting to actually create something original.

This means that a lot of themes are tied to the default theme's technical choices, because this way of
working makes it hard to make your own choices. For instance, since the default theme uses Bootstrap, it's
hard to use Foundation.

With the Starter Theme, the PrestaShop team decided to build a skeleton theme that will give you a kickstart
for your custom theme, with all the minimum code (essential template files, markup and JavaScript code)
and enough freedom to make your own choices. You can choose to use Bootstrap, Foundation or Blueprint. The
Starter Theme is not opinionated: there is no decision made to use either one library or another.

By using the Starter Theme as the foundation for your custom theme, everything is ready for you, you *just*
have to create upon it.


Downloading the Starter Theme
---------------------------------------

The Starter Theme is available on GitHub: https://github.com/PrestaShop/StarterTheme

If you download the StarterTheme and select it as the theme for your store, you will see minimalistic theme
with an overly simplistic (ugly?) style. This is only for development purpose. You should NOT use the Starter
Theme as is, and you should NOT use its default CSS rules nor include them in your theme: please delete
all files inside `_dev/css`.

.. figure:: img/starter-theme-dev-style.png

  Screenshot of the StarterTheme with dev style

.. note::
  The jQuery v2 library is loaded by the core.js file.

.. warning::
  Please note that if you want to sell your theme on the PrestaShop Addons marketplace, there are some
  specific requirements. For instance, Addons-distributed themes MUST use Bootstrap 4.


Modify. Don't override.
---------------------------------------

When you want to create a new theme, copy and paste all files from the Starter Theme inside your empty theme directory.
Then you start modifying it, and building your own theme.

Do not use it as a parent theme, you will only run into trouble and waste your time.

Once you removed all style in ``_dev/css``, your theme should like this:

.. figure:: img/starter-theme-no-style.png

  Screenshot of the StarterTheme once you removed the dev style


Read also: http://build.prestashop.com/tag/starter-theme/
