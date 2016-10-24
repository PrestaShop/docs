Theme organization
========================

Directory structure
-----------------------

A PrestaShop theme is a set of files which you can edit in order to change the look of your online shop.

Here are a few important tidbits:

- All themes have their files located in the /themes folder, at the root of PrestaShop's folder.
- Each theme has its own sub-folder, in the main themes folder.
- Each theme is made of template files (.tpl), image files (.jpg, .png and such), one or more CSS files (.css), and usually JavaScript files (.js).
- Each theme has a preview.png image file in its folder, enabling the shop-owner to see what the theme looks like directly from the back office, and select the theme appropriately.

The best way to learn how to create a theme for PrestaShop 1.7 is to dive into the StarterTheme.

Here is its organization, which is explained further below.

.. code-block:: bash

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
      │   ├── listing
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

=========== ========================================================================================================
Folder      Purpose
=========== ========================================================================================================
_dev        Contains the raw development files for your SCSS, JavaScript and image assets.
            They are to be compiled using Webpack, and turned into production assets.
assets      Contains the production assets, compiled by Webpack from the _dev files.
config      Contains configuration file. By default, it only has the theme.yml file.
module      Contains either theme-specific modules, or the theme's version of native modules' template
            files. For instance, the
            ``themes/classic/modules/ps_categorytree/views/templates/front/ps_categorytree.tpl`` file
            replaces the Category module's own ``modules/ps_categorytree/views/templates/front/ps_categorytree.tpl``
plugins     Your custom smarty plugins
templates   Contains the template files themselves (.tpl), mostly in contextual subfolders (catalog,
            checkout, cms, etc.). The _partials folder contains "partial templates", which means parts
            that can used by / included into several templates: header.tpl, breadcrumb.tpl, footer.tpl, etc.
            This prevents redundant code blocks, and makes themes easier to maintain.
=========== ========================================================================================================


Required templates and libraries
----------------------------------

Required templates
^^^^^^^^^^^^^^^^^^^^^

When you install/enable a theme, PrestaShop checks if the theme is valid: it looks for the theme.yml file
(and checks its content), its declared compatibility, and the existence of some files.

There is a list of files that need to exists, even if they're empty. Please see dedicated documentation
to know :doc:`what makes a theme valid <../distribution/testing>`.

It could be that you've built some sort of groundbreaking theme and it doesn't exactly work like the
Starter Theme does. For instance, if you don't have a product page, then you don't need the product.tpl file.
In that case, you just have to create an empty product.tpl file. Be nice to the next developer and
add a comment indicating where the code related to products can be found ;)

Required libraries
^^^^^^^^^^^^^^^^^^^^^

jQuery v2.1 is loaded by the core (bundled in ``core.js``) file, but no other libraries, since the idea is that the
Starter Theme should not be opinionated.

Read more about :doc:`assets management <../assets/index>`.

