What is a PrestaShop module?
====================================

PrestaShop's extensibility revolves around modules, which are small
programs that make use of PrestaShop's functionalities and changes them
or add to them in order to make PrestaShop easier to use or more
tailored to the merchant's needs.

Technical principles behind a module
--------------------------------------------

A PrestaShop module consists of a main PHP file with as many other PHP
files as needed, as well as the necessary template (``.tpl``) files and
assets (images, JavaScript, CSS, etc.) to display the module's
interface, whether to the customer (on the front office) or to the
merchant (on the back office).

Any PrestaShop module, once installed on an online shop, can interact
with one or more "hooks". Hooks enable you to hook/attach your code to
the current View at the time of the code parsing (i.e., when displaying
the cart or the product sheet, when displaying the current stock, etc.).
Specifically, a hook is a shortcut to the various methods available from
the ``Module`` object, as assigned to that hook.

Modules' operating principles
--------------------------------------------

Modules are the ideal way to let your talent and imagination as a
developer express themselves, as the creative possibilities are many and
you can do pretty much anything with PrestaShop's module API.

Any module:

-  can display a variety of content (blocks, text, etc.), perform many
   tasks (batch update, import, export, etc.), interface with other
   tools, and much much more.
-  can be made as configurable as necessary; the more configurable it
   is, the easier it will be to use, and thus will be able to address
   the needs of a wider range of users.
-  can add functionalities to PrestaShop without having to edit its core
   files, thus making it easier to perform an update of PrestaShop
   without having the transpose all core changes. Indeed, you should
   always strive to stay away from core files when building a module,
   even though this may seem necessary in some situations.

Main differences between 1.6 and 1.7 modules
--------------------------------------------

PrestaShop 1.7 was built so that modules that were written for PS 1.6
could work almost as-is -- save for minor changes and a cosmetic update,
the template files being in need of adapting to the 1.7 default theme.

The major module development changes in PrestaShop 1.7 are explained in
details `in this Build
article <http://build.prestashop.com/news/module-development-changes-in-17/>`__,
and are integrated into this updated documentation. If you already know
how to create a module that works with PS 1.6, we strongly advise you to
read that article from top to bottom in order to get up to speed with
1.7 development.

File structure for a PS 1.7 module
--------------------------------------------

TODO


The PrestaShop 1.7 file structure
--------------------------------------------


The PrestaShop developers have done their best to clearly and
intuitively separate the various parts of the software.

Here is how the files are organized:

-  ``/admin`` (the name is customized on installation): contains all the
   PrestaShop files pertaining to the back office. When accessing this
   folder with your browser, you will be asked to provide proper
   identification, for security reasons. **Important**: you should make
   sure to protect that folder with a ``.htaccess`` or ``.htpasswd``
   file!
-  ``/app``: NEW IN 1.7.
-  ``/cache``: contains temporary folders that are generated and re-used
   in order to alleviate the server's load.
-  ``/classes``: contains all the files pertaining to PrestaShop's
   object model (some are used for the front office, others for the back
   office). Each file represents (and contains) a PHP class, and its
   methods/properties.
-  ``/config``: contains all of PrestaShop's configuration files. Unless
   asked to, you should *never* edit them, as they are directly handled
   by PrestaShop's installer and back office.
-  ``/controllers``: contains all the files pertaining to PrestaShop
   controllers – as in Model-View-Controller (or MVC), the software
   architecture used by PrestaShop. Each file controls a specific part
   of PrestaShop.
-  ``/docs``: contains some documentation, the licenses, and the sample
   import files. *Note*: it should be deleted in a production
   environment.
-  \`/download: contains your virtual products, which can be downloaded
   by the user who paid for it. Files are stored with a md5 filename.
-  ``/img``: contains all of PrestaShop's default images, icons and
   picture files – that is, those that do not belong to the theme. This
   is where you can find the pictures for product categories (``/c``
   sub-folder), those for the products (``/p`` sub-folder), and those
   for the back office itself (``/admin`` sub-folder).
-  ``/install``: contains all the files related to PrestaShop's
   installer. You will be required to delete it after installation, in
   order to increase security.
-  ``/js``: contains all JavaScript files that are not attached to
   themes. Most of them belong to the back office. This is also where
   you will find the jQuery framework.
-  ``/localization``: contains all of PrestaShop's localization files –
   that is, files that contain local information, such as currency,
   language, tax rules and tax rule groups, states and the various units
   in use in the chosen country (i.e., volume in liter, weight in
   kilograms, etc.).
-  ``/mails``: contains all HTML and text files related to e-mails sent
   by PrestaShop. Each language has its specific folder, where you can
   manually edit their content if you wish. PrestaShop contains a tool
   to edit your e-mails, located in the back office, in the Localization
   > Translation page.
-  ``/modules``: contains all of PrestaShop's modules, each in its own
   folder. If you wish to definitely remove a module, first uninstall it
   from the back office, then only should you delete its folder.
-  ``/override``: this is a special folder that appeared with PrestaShop
   1.4. By using PrestaShop's regular folder/filename convention, it is
   possible to create files that override PrestaShop's default classes
   or controllers. This enables you to change PrestaShop core behavior
   without touching to the original files, keeping them safe for the
   next update. *Note*: overrides are not recommended for modules that
   you intend to distribute/sell, and are strictly forbidden in partner
   modules. Keep them for your own shop.
-  ``/pdf``: contains all the template files (``.tpl``) pertaining to
   the PDF file generation (invoice, delivery slips, etc.). Change these
   files in order to change the look of the PDF files that PrestaShop
   generates.
-  ``/src``: NEW IN 1.7. Contains the architecture files, comprising the
   Symfony framework, the legacy framework, and the Adapter classes.
-  ``/tests``: NEW IN 1.7. Contains automated tests. This folder is not
   part of the public archive.
-  ``/themes``: contains all the currently-installed themes, each in its
   own folder.
-  ``/tools``: contains external tools that were integrated into
   PrestaShop. For instance, this were you'll find Smarty (template
   engine), TCPDF (PDF file generator), Swift (mail sender), PEAR XML
   Parser (PHP tool), etc.
-  ``/translations``: contains a sub-folder for each available language.
   However, if you wish to change the translation, you must do so using
   the PrestaShop internal tool, and not edit them directly in this
   folder.
-  ``/travis-scripts``: NEW IN 1.7. Contains Travis-speficic scripts.
   This folder is not part of the public archive.
-  ``/upload``: contains the files that would be uploaded by clients for
   customizable products (for instance, a picture that a client wants
   printed on a mug).
-  ``vendor``: NEW IN 1.7. Contains various 3rd-party tools and
   frameworks that are used by PrestaShop, such as Composer, cURL,
   Doctrine, etc.
-  ``web``: NEW IN 1.7. Contains various web-server-specific files, such
   as favicon.ico or robots.txt. This folder is not part of the public
   archive.
-  ``/webservice``: contains files that enable third-party applications
   to access PrestaShop through its API.

Root folders that were removed between 1.6 and 1.7:

-  ``/css``: contained all the CSS files that are not attached to themes
   – hence, these were mostly used by the PrestaShop back office, and
   have now been moved to the ``theme.css`` file in the
   ``/admin/themes/new-theme/public`` folder.
-  ``/log``: contains the log files generated by PrestaShop at various
   stages, for instance during the installation process.


Modules folder
--------------------------------------------

PrestaShop's modules are found in the ``/modules`` folder, which is at
the root of the PrestaShop main folder. This is true for both default
modules (provided with PrestaShop) and 3rd-party modules that are
subsequently installed.

Modules can also be part of a theme if they are really specific to it.
In that case, they would be in the theme's own ``/modules`` folder, and
therefore under the following path: ``/themes/[my-theme]/modules``

Each module has its own sub-folder inside the ``/modules`` folder:
/bankwire, ``/birthdaypresent``, etc. About the cache

The ``/cache/class_index.php`` file contains the link between the class
and the declaration file. If there is a caching issue, this file can
safely be deleted.

The ``/config/xml`` folder contains the list of all the base modules:

::

    default_country_modules_list.xml
    must_have_modules_list.xml
    tab_modules_list.xml

When the store's front-end doesn't quite reflect your changes and
emptying the browser's cache is not effective, you should try emptying
the following folders:

::

    /cache/smarty/cache
    /cache/smarty/compile
