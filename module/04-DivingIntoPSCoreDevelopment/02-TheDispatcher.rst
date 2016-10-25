The Dispatcher
================================================


The Dispatcher handles URL redirections.

For instance, instead of using multiple files in the root folder like product.php, order.php or category.php, PrestaShop only uses one file: ``index.php``.

Starting with PrestaShop 1.5, front office URLs look like this:

-  ``/index.php?id_category=3&controller=category``
-  ``/index.php?id_product=7&controller=product``
-  ``/index.php?id_cms=4&controller=cms``
-  etc.

Likewise, back office URLs look like this:

-  ``/admin-dev/index.php?controller=AdminDashboard``
-  ``/admin-dev/index.php?controller=AdminProducts``
-  ``/admin-dev/index.php?controller=AdminCmsContent``
-  etc.

Additionally, the Dispatcher is built to support URL rewriting (or
"Friendly URLs"). Therefore, PrestaShop URLs which look like this when
URL-rewriting is off:

-  http://myprestashop.com/index.php?controller=category&id\_category=3&id\_lang=1
-  http://myprestashop.com/index.php?controller=product&id\_product=1&id\_lang=2

...will look like this when URL-rewriting is on:

-  http://myprestashop.com/en/3-music-ipods
-  http://myprestashop.com/fr/1-ipod-nano.html

There are several advantages to this system:

-  It is easier to add a controller.
-  You can use custom routes to change your friendly URLs (which is
   really better for SEO!)
-  There is only one single entry point into the software, which
   improves PrestaShop's reliability, and facilitates future
   developments.

The Dispatcher makes use of three abstract classes: ``Controller``,
``FrontController`` and ``AdminController`` (the last two inheriting
from the first one).

| New routes can be created by overriding the loadRoutes() method.
| The store's administrator can change a controller's URL using the "SEO
  & URLs" page in the back office's "Preferences" menu.
