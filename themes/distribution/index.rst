*************************************
Distribution
*************************************

Now that you created an amazing theme, you probably want to release it. The following documentation
will walkthrough creating a zip and passing addons validation.

But first, you need to test your theme!


.. include:: testing.rst


Creating a valid zip file
=============================

There is no longer any theme data in the database with PrestaShop 1.7. Hence a theme is installed as soon as
it's on the disk.

If you want to theme to appears in the backoffice, it's simply have to contain a ``config/theme.yml`` file.
This will only display it, if you want to select it as your active theme, it has to be valid. Read :doc:`What
makes a valid theme <testing>`


.. image:: img/export-current-theme.png


Once it's active you can export your theme using the _"Export current theme"_ button or use the command
from your terminal.

.. code-block::bash

  php app/console prestashop:theme:export THEME_DIRECTORY_NAME

What is exported
-------------------

Exporting your theme using the button or the command line will export the following data:

* All theme files in directory
* Dependencies specified in ``theme.yml`` (:doc:`See theme.yml doc <../gettingstarted/theme-yml>`)
* Theme translations

Distributing on Addons
========================

Please note that if you want to sell your theme on addons there are a few rules to follow:

** LIST TO REQUIREMENTS **

* Use bootstrap 4
