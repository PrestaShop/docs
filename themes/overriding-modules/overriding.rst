**************************************
Overrideing modules
***************************************


When you write a theme, you will need to override some module templates and assets if they need to match a specific markup.

With PrestaShop 1.7 all module override goes to the `modules` directory.

Example with this module directory structure

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


Override template or assets
============================


With PS 1.7

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


With PRestaShop 1.6

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

https://github.com/PrestaShop/PrestaShop/pull/5020


With include
==============

Very important. When loading a template, prestashop will look for override first.

Order:

1. /themes/THEME_NAME/modules/MODULE_NAME/views/templates/front/moduledemo.tpl
1. /modules/MODULE_NAME/views/templates/front/moduledemo.tpl

But if your file `moduledemo.tpl` include the file `included-template.tpl`, you will have to override it as well, even if you dont want to modify it (or edit the path)

The problem goes both ways if you want to modify the `included-template.tpl`, you will have to override `moduledemo.tpl`.


.. code-block:: smarty

  {include file='./included-template.tpl'}

PrestaShop introduce a new cool way to onlcude files in module tempaltes, all rules will be followed

.. code-block:: smarty

  {include file='module:MODULE_NAME/views/templates/front/included-template.tpl'}



[NOTE TO MODULE DEVELOPER]
USE IT !!!!!


[INFO]
see the template path in html sources
https://github.com/PrestaShop/PrestaShop/pull/5105
