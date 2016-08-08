********
Prologue
********

The default PrestaShop installation comes with one simple theme styled in black and white. This neutral style allows any seller to begin selling right away.

There are over 2,000 themes available through the [**PrestaShop Addons Marketplace**] (http://addons.prestashop.com/en/). Created by members of the PrestaShop community or the PrestaTeam. And sold at reasonable prices – some are even free.

As a graphic designer or web developer, you too can put your themes up for sale on the PrestaShop Addon's site.  And earn 70% of the retail price.



Migrating from PrestaShop 1.6
=============================

PrestaShop 1.7 introduces a new theme system. Which is quite different from its predecessor in 1.6. There are no simple methods to migrate your 1.6 theme to 1.7

During this automatic upgrade, your theme will be replaced with **Classic Theme**. Which is the new default theme. So we recommend you begin work on your 1.7 theme changes before you make the switch to PrestaShop 1.7!


##Dropped features

Some features have been dropped with PrestaShop 1.7. They were either already deprecated in 1.6, or proved too problematic to maintain.

+---------+---------------------+
| Feature | Reasons             |
+---------+---------------------+
| Live Edit | Live Edit will be replaced by a brand new theme editor in the next PrestaShop version |
+---------+---------------------+
| Scenes | Scenes have were already hidden for new installs of PS 1.6, and were unsupported. There are now removed in PrestaShop 1.7. |
+---------+---------------------+
| Mobile theme | In the last few years, webdesign have gone responsive. There is no need for a mobile-specific theme anymore: the way to go is responsive design. Note that modules can still be disabled on a device-type basis. |
+---------+---------------------+
| Map for store page | The default theme doesn't come with a map on the store page. |
+---------+---------------------+
| 5-step checkout | There is no more choice between 5-step checkout or one-page checkout (OPC). There is only one checkout, fully compatible with European laws. |
+---------+---------------------+


## Coding standard and guidelines


###General code guideline


Indent with spaces for every language (PHP, HTML, CSS, etc.): 4 spaces for PHP files, 2 spaces for all other filetypes.

Use our [.editorconfig](https://github.com/PrestaShop/PrestaShop/blob/develop/.editorconfig "Download Editor Config File") file in order to easily configure your editor. More about .editorconfig at http://editorconfig.org


####PHP files

You should follow the [PSR-2 standard](http://www.php-fig.org/psr/psr-2/) just like PrestaShop is now doing. In general, we tend to follow [Symfony's coding standards](http://symfony.com/doc/current/contributing/code/standards.html).


####HTML file


Use HTML 5 tags: 

`<br>`,
` <nav>`,
` <section>` etc. Read more at https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5

All open tags must be closed in the same file a `<div>` should **not** be opened in ``header.tpl`` then closed in ``footer.tpl``).
Sub-templates (templates meant to be included in another template) must reside inside a ``/_partials/`` folder.

####CSS

Use CSS3.

We recommend that you follow the RSCSS structure: http://rscss.io/

####JavaScript

Make sure your linter tool follows our .eslint file: https://github.com/PrestaShop/PrestaShop/blob/develop/.eslintrc

If you wish to write ECMAScript 2015 (ES6) code, we advise you to use the Babel compiler: https://babeljs.io/

A good JS practice consists in splitting files per use, and then compiling them into one.

Learn more about the ES2015 standard: https://babeljs.io/docs/learn-es2015/


###Requirements

Your PHP code should work on PHP 5.4+.

Your HTML/CSS/JS code shoud work with at least IE9+, Edge, Firefox 45, and Chrome 29. Mobile-wise: iOS 8.4 and Android Browser 4.4
