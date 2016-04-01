****************
THEME organization
****************

directory structure
========================

A detailler !

.. code-block::

  .
  ├── CONTRIBUTING.md
  ├── README.md
  ├── _dev
  │   ├── css
  │   │   └── ...
  │   ├── js
  │   │   └── ...
  │   ├── package.json
  │   └── webpack.config.js
  ├── assets
  │   ├── css
  │   │   ├── ...
  │   ├── img
  │   │   └── ...
  │   └── js
  │       └── ...
  ├── composer.json
  ├── config
  │   └── theme.yml
  ├── modules
  │   └── ...
  ├── plugins
  │   └── ...
  ├── preview.png
  └── templates
      ├── _partials
      │   └── ...
      ├── catalog
      │   ├── _partials
      │   │   └── ...
      │   └── ...
      ├── checkout
      │   ├── _partials
      │   │   └── ...
      │   └── ...
      ├── cms
      │   ├── _partials
      │   │   └── ...
      │   └── ...
      ├── contact.tpl
      ├── customer
      │   ├── _partials
      │   │   └── ...
      │   └── ...
      ├── errors
      │   ├── ...
      │   └── static
      │       └── ...
      ├── index.tpl
      ├── layouts
      │   ├── layout-both-columns.tpl
      │   ├── layout-content-only.tpl
      │   ├── layout-error.tpl
      │   ├── layout-full-width.tpl
      │   ├── layout-left-side-column.tpl
      │   └── layout-right-side-column.tpl
      ├── page.tpl
      └── wrapper.tpl


required templates and libs
============================

Required templates
--------------------

When you install/enable a theme, PRsetaShop will check if the theme is valid. It's looking looking for theme.yml file (and check its content), declared compatibility and some template files.

Here is the exhaustive and up-to-date (lol) file list:

* preview.png
* config/theme.yml
* assets/js/theme.js
* assets/css/theme.css
* templates/page.tpl
* templates/catalog/product.tpl
* templates/catalog/_partials/miniatures/product.tpl
* templates/checkout/cart.tpl
* templates/checkout/checkout.tpl
* templates/_partials/head.tpl
* templates/_partials/header.tpl
* templates/_partials/notifications.tpl
* templates/_partials/footer.tpl


[NOTE]
All these files need to exists, even if they're empty.
maybe you've built some sort of ground breaking theme and it doesnt exactly work like the starter theme does. Like you don t have any product page, then you don't want the product.tpl file. You just have to create an empty one. be nice and add a comment to were the code related to products can be found ;)




jQuery is already loaded with core.js
but no other lib since not opinionated

[note] block sur addons
