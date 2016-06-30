****************
Theme organization
****************

Directory structure
========================

A PrestaShop theme is a set of files which you can edit in order to change the look of your online shop.

Here are a few important tidbits:

- All themes have their files located in the /themes folder, at the root of PrestaShop's folder.
- Each theme has its own sub-folder, in the main themes folder.
- Each theme is made of template files (.tpl), image files (.gif, .jpg, .png), one or more CSS files (.css), and sometimes even JavaScript files (.js).
- Each theme has a preview.png image file in its folder, enabling the shop-owner to see what the theme looks like directly from the back office, and select the theme appropriately.

The best way to learn how to create a theme for PrestaShop 1.7 is to dive into the default theme, "Classic".

Here is its organization, which is explained further below.

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

The folders are used this way:

- _dev: Contains the raw development files for your SCSS, JavaScript and image assets. They are to be compiled using Webpack, and turned into production assets.
- assets: Contains the production assets, compiled by Webpack from the _dev files.
- config: Contains configuration file. By default, it only has the theme.yml file.
- module: Contains either theme-specific modules, or the theme's version of native modules' template files. For instance, the themes/classic/modules/ps_categorytree/views/templates/hook/ps_categorytree.tpl file replaces the Category module's own modules/ps_categorytree/views/templates/hook/ps_categorytree.tpl
- plugins: 
- templates: Contains the template files themeselves (.tpl), mostly in contextual subfolders (catalog, checkout, cms, etc.). The _partials folder contains "partials", or "partial templates", which means parts that can used by / included into several templates: header.tpl, breadcrumb.tpl, footer.tpl, etc. This prevents redundant codeblocks, and makes themes easier to maintain.


Required templates and libraries
============================

Required templates
--------------------

When you install/enable a theme, PrestaShop checks if the theme is valid: it looks for the theme.yml file (and checks its content), its declared compatibility, and the existence of some template files.

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
It could be that you've built some sort of groundbreaking theme and it doesn't exactly work like the Starter Theme does. For instance, you don't have need a product page, then you don't want the product.tpl file. In that case, you just have to create an empty product.tpl file. Be nice to the next developper and add a comment indicating where the code related to products can be found ;)

jQuery is already loaded with the core.js file, but no other libraries, since the idea is that the Starter Theme should not opinionated.

// TODO add info about Addons block
