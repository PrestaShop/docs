---
title: Coding standards
weight: 10
aliases:
  - /1.7/development/coding_standards
---

# Coding standards

Consistency is important, even more so when writing open-source code, since the code belongs to millions of eyeballs, and bug-fixing relies on these teeming millions to actually locate bugs and understand how to solve them.

This is why, when writing anything for PrestaShop, be it a theme, a module or a core patch, you should strive to follow the following guidelines. They are the ones that PrestaShop's developers adhere to, and following them is the surest way to have your code be elegantly integrated in PrestaShop.

In short, code consistency helps keeping the code readable and maintainable.

## General conventions

All files containing code MUST:

* Use only UTF-8 without BOM.
* Use the Unix LF (linefeed) line ending.
* End with a single blank line.

## PHP code conventions

PHP files MUST follow the [PSR-2 standard](https://www.php-fig.org/psr/psr-2/) alongside [Symfony standards](https://symfony.com/doc/3.4/contributing/code/standards.html#structure).

{{% notice note %}}
Altough [Yoda conditions](https://en.wikipedia.org/wiki/Yoda_conditions) are suggested, they are not enforced.
{{% /notice %}}

## Javascript code conventions

Javascript files MUST follow the [Airbnb Javascript style guide](https://github.com/airbnb/javascript).

## HTML, CSS (Sass), Twig & Smarty code conventions

HTML, CSS (Sass), Twig and Smarty files MUST follow the [Mark Otto's coding standards](http://codeguide.co/).
Mark is the creator of the [Bootstrap framework](http://getbootstrap.com/).

## License information

All PrestaShop files MUST start with the PrestaShop license block:

### Core files

```
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
```

### Module files

```
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
``` 
