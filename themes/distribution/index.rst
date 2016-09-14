*************************************
Distribution
*************************************

Now that you created an amazing theme, you probably want to release it. The following documentation
will walkthrough creating a zip and passing addons validation.

But first, you need to test your theme!

.. include:: testing.rst

Creating a valid zip file
=============================

There is no longer any theme data in the database with PrestaShop 1.7. Hence a theme is installed as long as
it's on the disk.

If you want to theme to appears in the backoffice, it's simply have to contains a ``config/theme.yml`` file.
This will only display it, if you want to select it as your active theme, it has to be valid. Read :doc:`What
makes a valid theme <testing>`

Distributing on Addons
========================

Please note that if you want to sell your theme on addons
