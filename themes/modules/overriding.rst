**************************************
Overriding modules
**************************************


When you write a theme, you often need to override the templates and assets coming from a module so that they match your theme's specific markup needs.
Themes can override modules' assets (CSS and JavaScript only) by placing the corresponding file at a specific location.

With PrestaShop 1.7, all module overriding code goes to the `modules` directory (in your module's own directory).
Every PS 1.7 module developer should be aware of this change (introduced with PR 5020: https://github.com/PrestaShop/PrestaShop/pull/5020).

.. note::
  If your asset override is empty, PrestaShop will load nothing (neither the module one nor your override). This is useful
  if you want to fully remove this module style and add your own to your compiled ``theme.css``.

Examples in this page are based on this sample module directory structure:

.. code-block:: text

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
=========================================

With PrestaShop 1.7, here are the folder paths to create in order to override templates and assets:

.. code-block:: text

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


Compared to what was needed in PrestaShop 1.6, it is much simpler:

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
===========================================

There is one very important issue that you should be aware of.
When loading a template file (for instance 'moduledemo.tpl'), PrestaShop will look for overriding first, in the following order:

1. /themes/THEME_NAME/modules/MODULE_NAME/views/templates/front/moduledemo.tpl
2. /modules/MODULE_NAME/views/templates/front/moduledemo.tpl

But if your `moduledemo.tpl` file includes the `included-template.tpl` file, you will have to override 'included-template.tpl' as well, even if you don't want to modify it (nor to edit the path). This means that every file that an overridden file includes needs to be copy-pasted as-is in order for your override to work properly.

The issue goes both ways: if you want to modify the `included-template.tpl` file, you will have to override the `moduledemo.tpl` file that includes it.

.. code-block:: Smarty

  {include file='./included-template.tpl'}


PrestaShop 1.7 introduces a new cool way to include files in module templates. By using this method, all the expected rules will be followed:

.. code-block:: Smarty

  {include file='module:MODULE_NAME/views/templates/front/included-template.tpl'}


SmartyDev helps you debug!
=======================================

PrestaShop 1.7 also introduces our own SmartyDev tool, an Smarty extension which allows you to see the template's name within your gnerated HTML markup. This will help debuging a lot, especially because of template override.

Here an example of generated markup with SmartyDev activated:

.. code-block:: html

    [...]
            <a href="http://prestashop.ps/en/" class="dropdown-item">English</a>
          </li>
          </ul>
    </div>
    <!-- end /Users/julien/Sites/PrestaShop/themes/classic/modules/blocklanguages/blocklanguages.tpl -->

    <!-- begin /Users/julien/Sites/PrestaShop/themes/classic/modules/blockuserinfo/blockuserinfo.tpl -->
    <div class="user-info">
      <i class="material-icons _gray-darker">&#xE7FF;</i>
        <a class="logout"  href="http://prestashop.ps/fr/?mylogout=" rel="nofollow" title="Me déconnecter">Déconnexion</a>
        <a class="account" href="http://prestashop.ps/fr/mon-compte" title="Voir mon compte client" rel="nofollow"><span>Julien Bourdeau</span></a>
      </div>
    <!-- end /Users/julien/Sites/PrestaShop/themes/classic/modules/blockuserinfo/blockuserinfo.tpl -->

    <!-- begin /Users/julien/Sites/PrestaShop/themes/classic/modules/blockcart/blockcart.tpl -->
    <div class="blockcart cart-preview " data-refresh-url="http://prestashop.ps/fr/module/blockcart/ajax">
      <div class="header">
        <a rel="nofollow" href="#" title="cart">

    [...]

To use it, simply set the `_PS_MODE_DEV_` constant to `true` in your installation's `/config/defines.inc.php` file: add the `define('_PS_MODE_DEV_', true);` line to that file in order to turn the PrestaShop Developer Mode on, which features SmartyDev.
