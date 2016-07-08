********
Prologue
********

The default PrestaShop install offers a neutral theme in black and white, enabling sellers to quickly and freely start their activity, whatever their business line.

Nearly 2000 themes are available through the PrestaShop Addons marketplace (http://addons.prestashop.com/en/). They were created either by members of the PrestaShop community or the PrestaTeam, and are sold at reasonable prices – some are even free.

As a graphic designer/web developer, you too can put your themes up for sale on the PrestaShop Addons site, and earn 70% of the selling price.



Migrating from PrestaShop 1.6
=============================

PrestaShop 1.7 introduces a totally reworked theme system from version 1.6, with the goal of making PrestaShop upgrades easier, and of making it easier/faster to create a brand new theme.

The huge change to the theme system means that there is no easy way to migrate your PrestaShop 1.6 theme to PrestaShop 1.7.

When using the automatic upgrade from PrestaShop 1.6 to 1.7, your theme will be switched to the new default theme, called "Classic". We therefore advise you to work on your 1.7 theme before you make the switch to PrestaShop 1.7.


Dropped features
--------------

Some features have been dropped with PrestaShop 1.7. They were either already deprecated in 1.6, or proved too problematic to maintain.

+---------+---------------------+
| Feature | Reasons             |
+---------+---------------------+
| Live Edit | Live Edit will be replaced by a brand new theme editor in the next PrestaShop version |
+---------+---------------------+
| Scenes | Scenes have were alreadt hidden for new installes of PS 1.6, and were unsupported. There are now removed in PrestaShop 1.7. |
+---------+---------------------+
| Mobile theme | In the last few years, webdesign have gone responsive. There is no need for a mobile-specific theme anymore: the way to go is responsive design. Note that modules can still be disabled on a device-type basis. |
+---------+---------------------+
| Map for store page | The default theme doesn't come with a map on the store page. |
+---------+---------------------+
| 5-step checkout | There is no more choice between 5-step checkout or one-page checkout (OPC). There is only one checkout, fully compatible with European laws. |
+---------+---------------------+


Coding standard and guidelines
------------------------------

General code guideline
~~~~~~~~~~~~~~~~~~~~~~

Intend with spaces for every language (PHP, HTML, CSS, etc.): 4 spaces for PHP files, 2 spaces for all other filetypes.

Use our `.editorconfig file <http://editorconfig.org/>`_  in order to easily configure your editor: https://github.com/PrestaShop/PrestaShop/blob/develop/.editorconfig


PHP files
~~~~~~~~~

You should follow the `PSR-2 standard <http://www.php-fig.org/psr/psr-2/>`_, just like PrestaShop does.

In general, we tend to follow `Symfony's coding standards <http://symfony.com/doc/current/contributing/code/standards.html>`_.


HTML file
~~~~~~~~~

Use HTML 5 tags: 

* <br /> --> <br>, 
* <nav>,
* <section>, 
* etc.

All open tags must be closed in the same file (a <div> should **not** be opened in ``header.tpl`` then closed in ``footer.tpl``).
Subtemplates (templates meant to be included in another template) must reside inside a ``/_partials/`` folder.


CSS
~~~

Use CSS3.

We recommend that you follow the RSCSS structure: http://rscss.io/


JavaScript
~~~~~~~~~~

Make sure your linter tool follows our .eslint file: https://github.com/PrestaShop/PrestaShop/blob/develop/.eslintrc

If you wish to write ECMAScript 2015 (ES6) code, we advise you to use the Babel compiler: https://babeljs.io/

A good JS practice consists in splitting files per use, and then compiling them into one.

Learn more about the ES2015 standard: https://babeljs.io/docs/learn-es2015/


Requirements
-----------------

Your PHP code should work on PHP 5.4+.

Your HTML/CSS/JS code shoud work with at least IE9+, Edge, Firefox 45, and Chrome 29. Mobile-wise: iOS 8.4 and Android Browser 4.4
