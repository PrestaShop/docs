---
title: The PrestaShop architecture
---

The PrestaShop architecture
---------------------------

The PrestaShop developers have done their best to clearly and
intuitively separate the various parts of the software.

Here is how the files are organized:

-   `/admin` (the name is customized on installation): contains all the
    PrestaShop files pertaining to the back office. When accessing this
    folder with your browser, you will be asked to provide proper
    identification, for security reasons. **Important**: you should make
    sure to protect that folder with a `.htaccess` or `.htpasswd` file!
-   `/app`: NEW IN 1.7.
-   `/cache`: contains temporary folders that are generated and re-used
    in order to alleviate the server's load.
-   `/classes`: contains all the files pertaining to PrestaShop's object
    model (some are used for the front office, others for the
    back office). Each file represents (and contains) a PHP class, and
    its methods/properties.
-   `/config`: contains all of PrestaShop's configuration files. Unless
    asked to, you should *never* edit them, as they are directly handled
    by PrestaShop's installer and back office.
-   `/controllers`: contains all the files pertaining to PrestaShop
    controllers – as in Model-View-Controller (or MVC), the software
    architecture used by PrestaShop. Each file controls a specific part
    of PrestaShop.
-   `/docs`: contains some documentation, the licenses, and the sample
    import files. *Note*: it should be deleted in a
    production environment.
-   \`/download: contains your virtual products, which can be downloaded
    by the user who paid for it. Files are stored with a md5 filename.
-   `/img`: contains all of PrestaShop's default images, icons and
    picture files – that is, those that do not belong to the theme. This
    is where you can find the pictures for product categories (`/c`
    sub-folder), those for the products (`/p` sub-folder), and those for
    the back office itself (`/admin` sub-folder).
-   `/install`: contains all the files related to
    PrestaShop's installer. You will be required to delete it after
    installation, in order to increase security.
-   `/js`: contains all JavaScript files that are not attached
    to themes. Most of them belong to the back office. This is also
    where you will find the jQuery framework.
-   `/localization`: contains all of PrestaShop's localization files –
    that is, files that contain local information, such as currency,
    language, tax rules and tax rule groups, states and the various
    units in use in the chosen country (i.e., volume in liter, weight in
    kilograms, etc.).
-   `/mails`: contains all HTML and text files related to e-mails sent
    by PrestaShop. Each language has its specific folder, where you can
    manually edit their content if you wish. PrestaShop contains a tool
    to edit your e-mails, located in the back office, in the
    Localization &gt; Translation page.
-   `/modules`: contains all of PrestaShop's modules, each in its
    own folder. If you wish to definitely remove a module, first
    uninstall it from the back office, then only should you delete
    its folder.
-   `/override`: this is a special folder that appeared with
    PrestaShop 1.4. By using PrestaShop's regular folder/filename
    convention, it is possible to create files that override
    PrestaShop's default classes or controllers. This enables you to
    change PrestaShop core behavior without touching to the original
    files, keeping them safe for the next update. *Note*: overrides are
    not recommended for modules that you intend to distribute/sell, and
    are strictly forbidden in partner modules. Keep them for your
    own shop.
-   `/pdf`: contains all the template files (`.tpl`) pertaining to the
    PDF file generation (invoice, delivery slips, etc.). Change these
    files in order to change the look of the PDF files that
    PrestaShop generates.
-   `/src`: NEW IN 1.7. Contains the architecture files, comprising the
    Symfony framework, the legacy framework, and the Adapter classes.
-   `/tests`: NEW IN 1.7. Contains automated tests. This folder is not
    part of the public archive.
-   `/themes`: contains all the currently-installed themes, each in its
    own folder.
-   `/tools`: contains external tools that were integrated
    into PrestaShop. For instance, this were you'll find Smarty
    (template engine), TCPDF (PDF file generator), Swift (mail sender),
    PEAR XML Parser (PHP tool), etc.
-   `/translations`: contains a sub-folder for each available language.
    However, if you wish to change the translation, you must do so using
    the PrestaShop internal tool, and not edit them directly in
    this folder.
-   `/travis-scripts`: NEW IN 1.7. Contains Travis-speficic scripts.
    This folder is not part of the public archive.
-   `/upload`: contains the files that would be uploaded by clients for
    customizable products (for instance, a picture that a client wants
    printed on a mug).
-   `/vendor`: NEW IN 1.7. Contains various 3rd-party tools and
    frameworks that are used by PrestaShop, such as Composer, cURL,
    Doctrine, etc.
-   `/webservice`: contains files that enable third-party applications
    to access PrestaShop through its API.

Root folders that were removed between 1.6 and 1.7:

-   `/css`: contained all the CSS files that are not attached to themes
    – hence, these were mostly used by the PrestaShop back office, and
    have now been moved to the `theme.css` file in the
    `/admin/themes/new-theme/public` folder.
-   `/log`: contains the log files generated by PrestaShop at various
    stages, for instance during the installation process.
