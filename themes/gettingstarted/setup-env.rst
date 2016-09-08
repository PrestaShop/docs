Setting up your local environment
==========================================

Now that you intend to building a theme for PrestaShop, you are better off keeping all your development work
on your machine. The main advantage is that it makes it possible for you to entirely bypass the process of
uploading your files on your online server in order to test your changes. Another advantage is that a local
test environment enables you to test code without the risk of breaking your production store. Having a
local environment is the essential first step in the path of web development.

.. note::
  The following content assumes you're a developer and you want to create a theme or a module.

Installing PrestaShop
------------------------

We advise you to install PrestaShop using `Git`_ and `Composer`_.

Then, open a command line on your (empty) working directory, then:

1. ``git clone https://github.com/PrestaShop/PrestaShop.git``
2. ``composer install``

Using git you can choose your PrestaShop version: ``git checkout 1.7.0.0``. Also we would warn you
to test your final result with a zip release, just for safety (since vendor version might be slightly
different).

.. note::
  If you haven't done it yet, we strongly recommend you to read our article `Set Up Your Git For Contributing`_

Building your .gitignore file
------------------------------------

A gitignore file is a must-have for any Git-versioned project, as it specifies intentionally untracked
files that Git should ignore.

What to ignore
^^^^^^^^^^^^^^^^^^

Generally, you shouldn’t version the following types of files:

* Temporary files (such as cache files)
* Generated files (such as minified CSS or retrieved XML files)
* Files with credentials or personal information (such as ``settings.inc.php``)
* OS and IDE-related files (such as .DS_Store or .idea/)

.. code-block:: text

  assets/css/*
  assets/js/*
  node_modules/

We suggest that you build your own using http://gitignore.io.

.. tip::
  If you are building a full project for a client, you can read our `article on building a gitignore for PrestaShop`_.


Create your theme from the Starter Theme
------------------------------------------------

When you want to create a theme, the best way is to use the StarterTheme as a base theme.

Create a new folder under ``themes/`` then download the StarterTheme and copy its files in your new folder.

`Download StarterTheme <https://github.com/PrestaShop/StarterTheme.git>`_

Create your theme.yml file
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

First of all, you need to rename ``config/theme.dist.yml`` to ``config/theme.yml`` and edit it
according to your theme's name.


.. code-block:: yaml

  name: YOUR_THEME_DIRECTORY_NAME
  display_name: YOUR THEME NAME
  version: 1.0.0
  author:
    name: "PrestaShop Team"
    email: "pub@prestashop.com"
    url: "http://www.prestashop.com"

  meta:
    compatibility:
        from: 1.7.0.0
        to: ~

Once it' done you'll be able to select your theme in your backoffice.

.. _Composer: https://getcomposer.org/
.. _Git: https://git-scm.com/
.. _`Set Up Your Git For Contributing`: http://build.prestashop.com/howtos/misc/set-up-your-git-for-contributing/
.. _`article on building a gitignore for PrestaShop` : http://build.prestashop.com/howtos/misc/prestashop-perfect-gitignore/
