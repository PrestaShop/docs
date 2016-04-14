****************
Theme organization
****************

Directory structure
========================

// TODO Needs more details!

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


Required templates and libraries
============================

Required templates
--------------------

When you install/enable a theme, PrestaShop will check if the theme is valid: it looks for theme.yml file (and checks its content), its declared compatibility, and some template files.

Here is the complete list of files that are checked:

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
All these files need to exist, even if they're empty.
It could be that you've built some sort of groundbreaking theme and it doesn't exactly work like the Starter Theme does. For instance, you don't have need a product page, then you don't want the product.tpl file. In that case, you just have to create an empty product.tpl file. Be nice to the next develop and add a comment indicating where the code related to products can be found ;)

jQuery is already loaded with the core.js file, but no other libraries, since the idea is that the Starter Theme should not opinionated.

// TODO add info about Addons block
