**************************************
Overriding modules
***************************************


When you write a theme, you often need to override templates and assets from a module so that they match your theme's specific markup needs.
Theme can override module assets (CSS and JavaScript only) by placing the corresponding file at a specific location.

With PrestaShop 1.7, all module override code goes to the `modules` directory (in your module's own directory).
Every PS 1.7 module developer should be aware of this change (introduced with PR 5020: https://github.com/PrestaShop/PrestaShop/pull/5020).

Examples in this page are based on this sample module directory structure:

.. code-block:: tree

  .
  ├── css
  │   ├── external-lib.css
  │   └── style.css
  ├── js
  │   └── app.js
  ├── moduledemo.php
  └── views
      └── templates
          └── front
              ├── included-template.tpl
              └── moduledemo.tpl

  5 directories, 6 files


Overriding templates and assets
============================

With PrestaShop 1.7, here is the paths to create in order to override templates and assets:

.. code-block:: tree

  .
  └── modules
      ├── css
      │   ├── external-lib.css
      │   └── style.css
      ├── js
      │   └── app.js
      └── views
          └── templates
              └── front
                  ├── included-template.tpl
                  └── moduledemo.tpl

  6 directories, 5 files


Compare with what was needed in PrestaShop 1.6:

.. code-block:: tree

  .
  ├── css
  │   └── modules
  │       └── css
  │           ├── external-lib.css
  │           └── style.css
  ├── js
  │   └── modules
  │       └── js
  │           └── app.js
  └── modules
      └── views
          └── templates
              └── front
                  ├── included-template.tpl
                  └── moduledemo.tpl

  10 directories, 5 files


Overriding with the 'include' method
==============================

There is one very important issue that you should be aware of.
When loading a template file (for instance 'moduledemo.tpl'), PrestaShop will look for overriding first, in the following order:

1. /themes/THEME_NAME/modules/MODULE_NAME/views/templates/front/moduledemo.tpl
2. /modules/MODULE_NAME/views/templates/front/moduledemo.tpl

But if your `moduledemo.tpl` file includes the `included-template.tpl` file, you will have to override 'included-template.tpl' as well, even if you don't want to modify it (nor to edit the path). This means that every file that an overridden file includes needs to be copy-paster as-is in order for your override to work properly.

The issue goes both ways: if you want to modify the `included-template.tpl` file, you will have to override the `moduledemo.tpl` file that includes it.

.. code-block:: Smarty

  {include file='./included-template.tpl'}

  
PrestaShop introduce a new cool way to include files in module templates? By using this method, all the expected rules will be followed:

.. code-block:: Smarty

  {include file='module:MODULE_NAME/views/templates/front/included-template.tpl'}


SmartyDev helps you debug!
==========================

PrestaShop 1.7 introduces SmartyDev, an extension of Smarty which allows you to see the template name within your markup. To use it, simply enable the _PS_MODE_DEV_: in your installation's /config/defines.inc.php file, add the 'define('_PS_MODE_DEV_', true);' to turn the Developer Mode on.