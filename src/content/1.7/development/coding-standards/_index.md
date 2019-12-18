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
Although [Yoda conditions](https://en.wikipedia.org/wiki/Yoda_conditions) are suggested, they are not enforced.
{{% /notice %}}

[PHP CS Fixer](https://cs.sensiolabs.org/) has been configured for the PrestaShop project to help developers to comply with these conventions.

You can run it using the following command:
```bash
php ./vendor/bin/php-cs-fixer fix
```

The prestashop specific configuration file [can be found here](https://github.com/PrestaShop/PrestaShop/blob/develop/.php_cs.dist)

And you can also use the provided [git pre-commit](https://github.com/PrestaShop/PrestaShop/tree/develop/.github/contrib) sample in order to make sure you never forget to make your code compliant!

### Deprecations

Following [Symfony conventions](https://symfony.com/doc/3.4/contributing/code/conventions.html#deprecating-code), method and class deprecations in PrestaShop must be noted by adding the appropriate Phpdoc as well as a deprecation error:

```php
/**
 * @deprecated Since 1.7.6.0, use AnotherClass::someNewMethod() instead.
 */
public function someOldMethod()
{
    @trigger_error(
        sprintf(
            '%s is deprecated since version 1.7.6.0. Use %s instead.',
            __METHOD__,
            AnotherClass::class . '::someNewMethod()'
        ),
        E_USER_DEPRECATED
    );
}
```

## Javascript code conventions

Javascript files MUST follow the [Airbnb Javascript style guide](https://github.com/airbnb/javascript).

## HTML, CSS (Sass), Twig & Smarty code conventions

HTML, CSS (Sass), Twig and Smarty files MUST follow the [Mark Otto's coding standards](http://codeguide.co/).
Mark is the creator of the [Bootstrap framework](https://getbootstrap.com/).

[Stylelint](https://stylelint.io/) has been configured for the PrestaShop project to help developers to comply with these conventions.

The prestashop specific configuration file can be found [here](https://github.com/PrestaShop/stylelint-config).

Same as if you want to [compile assets][compile-assets], you need NodeJS and NPM to run it using the following command :

```bash
npm run scss-lint
```

If you want to use the stylelint's autofix functionality, you can use the following command :

```bash
npm run scss-fix
```

## License information

All PrestaShop files MUST start with the PrestaShop license block:

### Core files

```
/**
 * 2007-2019 PrestaShop SA and Contributors
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
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
```

### Module files

```
/**
 * 2007-2019 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
```

[compile-assets]: {{< ref "/1.7/development/compile-assets/_index.md" >}}