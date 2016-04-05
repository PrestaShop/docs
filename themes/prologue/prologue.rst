********
Prologue
********


With PrestaShop 1.7 we have rebuild the theme system from the ground up. We had 2 goals
in mind when doing this:

* Make PrestaShop upgrade easier
* Make it easy to integrate a new theme



Migrating from PrestaShop 1.6
=============================

This means that there is no easy way to migrate your front office form PrestaShop 1.6.
When upgrading your store, your theme will be switch to the new default theme called "classic".


Feature drop
--------------

Some feature have been dropped with PrestaShop, here is a  list of the main ones (non-exhaustive)

+---------+---------------------+
| Feature | Reason              |
+---------+---------------------+
| Live Edit | Live Edit will be replaced by a brand new theme editor in the next PrestaShop version|
+---------+---------------------+
| Scenes | Scenes have been hidden and unsupported in PrestaShop 1.6, is is fully removed in PrestaShop 1.7 |
+---------+---------------------+
| Mobile theme | Within the last few year theme have gone responsive, there were no need for a mobile-specific theme anymore. Modules can still be disabled on a device basis. |
+---------+---------------------+
| Map for store page | the default theme doesnt come with a map on the store page |
+---------+---------------------+
| 5 steps checkout | There is no more choice between 5 step checkout or one page checkout. There is only one checkout, fully compatible with European laws. |
+---------+---------------------+


Coding standard and guidelines
------------------------------

Intend with spaces for every language.

See our .editorconfig for details
http://editorconfig.org/

PHP
of course you follow PSR-1 et PSR-2

HTML

use html 5: <br /> --> <br>, <section>,...
all open tag must be closed in the same file (no div openned in header.tpl and closed in footer.tpl)
subtemplates meant to be included must live inside a _partials folder


css

CSS3
RSCSS http://rscss.io/


JS

make sure your linter follows our .eslint
ES6 -> babel
split files and compile
nothing specific about js but we recommend https://github.com/airbnb/javascrip


requirements
-----------------

php 5.4

Broswer supported for Bo and default theme classic
