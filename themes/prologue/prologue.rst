********
Prologue
********

With PrestaShop 1.7, we have rebuilt the theme system from the ground up. We had 2 goals
in mind when doing this:

* Make PrestaShop upgrades easier,
* Make it easy to create a new theme.



Migrating from PrestaShop 1.6
=============================

The huge change to the theme system means that there is no easy way to migrate your current theme for PrestaShop 1.6 to PrestaShop 1.7.
When upgrading your store, your theme will be switched to the new default theme, called "classic". We therefore advise you to work on your 1.7 theme before you make the switch to PS 1.7.


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

Intend with spaces for every language (PHP, HTML, CSS, etc.).

See our .editorconfig for details
http://editorconfig.org/


PHP files

You should follow the PSR-2 standard, just like PrestaShop does.


HTML file

Use html 5: <br /> --> <br>, <section>, etc.

All open tags must be closed in the same file (no div should be opened in header.tpl and closed in footer.tpl)
Subtemplates (templates meant to be included in another template) must reside inside a /_partials/ folder.


CSS

Use CSS3.
We recommand that you follow the RSCSS structure: http://rscss.io/


JavaScript

Make sure your linter tool follows our .eslint file.
ES6 -> babel
Split files and compile them.
ES2015 standard https://babeljs.io/docs/learn-es2015/


Requirements
-----------------

Your code should work on PHP 5.4+.

// TODO Browser supported for BO and default theme
