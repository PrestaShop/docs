---
title: Introduction
weight: 1
---

# Introduction

Technical principles behind a module
------------------------------------

A PrestaShop module consists of a main PHP file with as many other PHP
files as needed, as well as the necessary template (`.tpl`) files and
assets (images, JavaScript, CSS, etc.) to display the module's
interface, whether to the customer (on the front office) or to the
merchant (on the back office).

Any PrestaShop module, once installed on an online shop, can interact
with one or more "hooks". Hooks enable you to hook/attach your code to
the current View at the time of the code parsing (i.e., when displaying
the cart or the product sheet, when displaying the current stock, etc.).
Specifically, a hook is a shortcut to the various methods available from
the `Module` object, as assigned to that hook.

For security reasons, during validation, we do not accept any call
to another website/API in order to retrieve code that will later be
executed on server or client.

Modules' operating principles
-----------------------------

Modules are the ideal way to let your talent and imagination as a
developer express themselves, as the creative possibilities are many and
you can do pretty much anything with PrestaShop's module API.

Any module:

-   can display a variety of content (blocks, text, etc.), perform many
    tasks (batch update, import, export, etc.), interface with other
    tools, and much much more.
-   can be made as configurable as necessary; the more configurable it
    is, the easier it will be to use, and thus will be able to address
    the needs of a wider range of users.
-   can add functionalities to PrestaShop without having to edit its
    core files, thus making it easier to perform an update of PrestaShop
    without having the transpose all core changes. Indeed, you should
    always strive to stay away from core files when building a module,
    even though this may seem necessary in some situations.

Main differences between 1.6 and 1.7 modules
--------------------------------------------

PrestaShop 1.7 was built so that modules that were written for PS 1.6
could work almost as-is -- save for minor changes and a cosmetic update,
the template files being in need of adapting to the 1.7 default theme.

The major module development changes in PrestaShop 1.7 are explained in
details [in this Build
article](https://build.prestashop.com/news/module-development-changes-in-17/),
and are integrated into this updated documentation. If you already know
how to create a module that works with PS 1.6, we strongly advise you to
read that article from top to bottom in order to get up to speed with
1.7 development.

A few native modules have been split between 1.6 & 1.7 versions of PrestaShop, as listed here:

| Original module for PrestaShop 1.6 | Updated module for PrestaShop 1.7 |
| -----------------------------------|-----------------------------------|
| [advancedeucompliance](https://github.com/PrestaShop/advancedeucompliance) | [ps_legalcompliance](https://github.com/PrestaShop/ps_legalcompliance) |
| [bankwire](https://github.com/PrestaShop/bankwire) | [ps_wirepayment](https://github.com/PrestaShop/ps_wirepayment) |
| [blockadvertising](https://github.com/PrestaShop/blockadvertising) | [ps_advertising](https://github.com/PrestaShop/ps_advertising) |
| [blockbanner](https://github.com/PrestaShop/blockbanner) | [ps_banner](https://github.com/PrestaShop/ps_banner) |
| [blockbestsellers](https://github.com/PrestaShop/blockbestsellers) | [ps_bestsellers](https://github.com/PrestaShop/ps_bestsellers) |
| [blockcart](https://github.com/PrestaShop/blockcart) | [ps_shoppingcart](https://github.com/PrestaShop/ps_shoppingcart) |
| [blockcategories](https://github.com/PrestaShop/blockcategories) | [ps_categorytree](https://github.com/PrestaShop/ps_categorytree) |
| [blockcms](https://github.com/PrestaShop/blockcms) | [ps_linklist](https://github.com/PrestaShop/ps_linklist) |
| [blockcmsinfo](https://github.com/PrestaShop/blockcmsinfo) | [ps_customtext](https://github.com/PrestaShop/ps_customtext) |
| [blockcontact](https://github.com/PrestaShop/blockcontact) | [ps_contactinfo](https://github.com/PrestaShop/ps_contactinfo) |
| [blockcurrencies](https://github.com/PrestaShop/blockcurrencies) | [ps_currencyselector](https://github.com/PrestaShop/ps_currencyselector) |
| [blockcustomerprivacy](https://github.com/PrestaShop/blockcustomerprivacy) | [ps_dataprivacy](https://github.com/PrestaShop/ps_dataprivacy) |
| [blocklanguages](https://github.com/PrestaShop/blocklanguages) | [ps_languageselector](https://github.com/PrestaShop/ps_languageselector) |
| [blocklayered](https://github.com/PrestaShop/blocklayered) | [ps_facetedsearch](https://github.com/PrestaShop/ps_facetedsearch) |
| [blockmanufacturer](https://github.com/PrestaShop/blockmanufacturer) | [ps_brandlist](https://github.com/PrestaShop/ps_brandlist) |
| [blockmyaccount](https://github.com/PrestaShop/blockmyaccount) | [ps_customeraccountlinks](https://github.com/PrestaShop/ps_customeraccountlinks) |
| [blocknewsletter](https://github.com/PrestaShop/blocknewsletter) | [ps_emailsubscription](https://github.com/PrestaShop/ps_emailsubscription) |
| [blocknewproducts](https://github.com/PrestaShop/blocknewproducts) | [ps_newproducts](https://github.com/PrestaShop/ps_newproducts) |
| [blockrss](https://github.com/PrestaShop/blockrss) | [ps_rssfeed](https://github.com/PrestaShop/ps_rssfeed) |
| [blocksearch](https://github.com/PrestaShop/blocksearch) | [ps_searchbar](https://github.com/PrestaShop/ps_searchbar) |
| [blocksocial](https://github.com/PrestaShop/blocksocial) | [ps_socialfollow](https://github.com/PrestaShop/ps_socialfollow) |
| [blockspecials](https://github.com/PrestaShop/blockspecials) | [ps_specials](https://github.com/PrestaShop/ps_specials) |
| [blocksupplier](https://github.com/PrestaShop/blocksupplier) | [ps_supplierlist](https://github.com/PrestaShop/ps_supplierlist) |
| [blocktopmenu](https://github.com/PrestaShop/blocktopmenu) | [ps_mainmenu](https://github.com/PrestaShop/ps_mainmenu) |
| [blockuserinfo](https://github.com/PrestaShop/blockuserinfo) | [ps_customersignin](https://github.com/PrestaShop/ps_customersignin) |
| [blockviewed](https://github.com/PrestaShop/blockviewed) | [ps_viewedproduct](https://github.com/PrestaShop/ps_viewedproduct) |
| [carriercompare](https://github.com/PrestaShop/carriercompare) | [ps_carriercomparison](https://github.com/PrestaShop/ps_carriercomparison) |
| [cashondelivery](https://github.com/PrestaShop/cashondelivery) | [ps_cashondelivery](https://github.com/PrestaShop/ps_cashondelivery) |
| [cheque](https://github.com/PrestaShop/cheque) | [ps_checkpayment](https://github.com/PrestaShop/ps_checkpayment) |
| [crossselling](https://github.com/PrestaShop/crossselling) | [ps_crossselling](https://github.com/PrestaShop/ps_crossselling) |
| [feeder](https://github.com/PrestaShop/feeder) | [ps_feeder](https://github.com/PrestaShop/ps_feeder) |
| [followup](https://github.com/PrestaShop/followup/) | [ps_reminder](https://github.com/PrestaShop/ps_reminder) |
| [ganalytics](https://github.com/PrestaShop/ganalytics) | [ps_googleanalytics](https://github.com/PrestaShop/ps_googleanalytics) |
| [homefeatured](https://github.com/PrestaShop/homefeatured) | [ps_featuredproducts](https://github.com/PrestaShop/ps_featuredproducts) |
| [homeslider](https://github.com/PrestaShop/homeslider) | [ps_imageslider](https://github.com/PrestaShop/ps_imageslider) |
| [mailalerts](https://github.com/PrestaShop/mailalerts) | [ps_emailalerts](https://github.com/PrestaShop/ps_emailalerts) |
| [onboarding](https://github.com/PrestaShop/onboarding) | [welcome](https://github.com/PrestaShop/welcome) |
| [productscategory](https://github.com/PrestaShop/productscategory) | [ps_categoryproducts](https://github.com/PrestaShop/ps_categoryproducts) |
| [producttooltip](https://github.com/PrestaShop/producttooltip) | [ps_productinfo](https://github.com/PrestaShop/ps_productinfo) |
| [socialsharing](https://github.com/PrestaShop/socialsharing) | [ps_sharebuttons](https://github.com/PrestaShop/ps_sharebuttons) |

Modules folder
--------------

PrestaShop's modules are found in the `/modules` folder, which is at the
root of the PrestaShop main folder. This is true for both default
modules (provided with PrestaShop) and 3rd-party modules that are
subsequently installed.

Modules can also be part of a theme if they are really specific to it.
In that case, they would be in the theme's own `/modules` folder, and
therefore under the following path: `/themes/[my-theme]/modules`

Each module has its own sub-folder inside the `/modules` folder:
`/bankwire`, `/birthdaypresent`, etc.

About the cache
---------------

The `/cache/class_index.php` file contains the link between the class
and the declaration file. If there is a caching issue, this file can
safely be deleted.

The `/config/xml` folder contains the list of all the base modules:

    default_country_modules_list.xml
    must_have_modules_list.xml
    tab_modules_list.xml

When the store's front-end doesn't quite reflect your changes and
emptying the browser's cache is not effective, you should try emptying
the following folders:

    /cache/smarty/cache
    /cache/smarty/compile
