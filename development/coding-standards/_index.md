---
title: Coding standards
weight: 10
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

### Code documentation

Make sure that **classes**, **attributes** and **methods** are properly documented using doc blocks, regardless of visibility. As a rule of thumb, consider that a developer should be able to understand a component and use it without even having to read the source code – signatures and doc blocks should suffice for most cases.

Pay particular attention to the following:

- **Describe the class's purpose.** If you have a hard time describing what the class is meant for, it may be a sign that it has too many responsibilites and needs to be decomposed.
- **Describe intent, not implementation.** Explain what the method/class is for, not how it performs it—unless that information is important for the developer using it.
- **Document attributes, parameters and return values both in type and semantics.** A variable named `$content` might be obviously a string, but we need more context to understand what its purpose is.
- **It is preferable to waste time describing the obvious than to leave the ambiguous open to interpretation.** This prevents more bugs than you can imagine.

## PHP code conventions

PHP files MUST follow the [PSR-2 standard](https://www.php-fig.org/psr/psr-2/) alongside [Symfony standards](https://symfony.com/doc/4.4/contributing/code/standards.html#structure).

{{% notice note %}}
Although [Yoda conditions](https://en.wikipedia.org/wiki/Yoda_conditions) are suggested, they are not enforced.
{{% /notice %}}

### Making your code follow our coding standards

[PHP CS Fixer](https://cs.symfony.com/) has been configured for the PrestaShop project to help developers to comply with these conventions.

You can run it using the following command:
```bash
php ./vendor/bin/php-cs-fixer fix
```

The prestashop specific configuration file [can be found here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/.php-cs-fixer.dist.php). Also, you can also use the provided [git pre-commit](https://github.com/PrestaShop/PrestaShop/tree/develop/.github/contrib) sample in order to make sure you never forget to make your code compliant!

### Documenting types

Parameters and return values SHOULD be described using Phpdoc as [documented by Phpstan](https://phpstan.org/writing-php-code/phpdoc-types), especially when the type cannot be strictly defined using PHP types (e.g. collections, structs, mixed types).

Example:

```php
/**
 * @var string[] Collection of IETF language tag (eg. "en-US")
 */
public $locales;
```

Particular attention should be paid to documenting arrays and array structures:

- Use the simplified syntax for collections, like `string[]` or `SomeType[]`.
- If the array's index is relevant (e.g., non-sequential), use the generics-style annotation, like `array<int, string>`.
- If the array is actually a struct (i.e. an associative array whose schema is known), then it MUST be described it using the [array shape annotation](https://phpstan.org/writing-php-code/phpdoc-types#array-shapes), like `array{'foo': int, "bar": string}`.

### Strict typing

All new PHP code should be strictly typed.

This means that all new methods **must** specify a type for all parameters as well as the return type. Similarly, all new classes except interfaces must enforce type strictness via `declare`:

```php
<?php
/** 2007-2020 PrestaShop SA and Contributors... */

declare(strict_types=1);

namespace Foo\Bar;

class MyClass
{
    public function doStuff(string $foo, array $bar): void
    {
    }   
}
```

{{% notice note %}}
**It's important to have all classes declare type strictness.** Since PHP 7 is still inherently weakly typed, it's not enough to have your class declare type strictness to make it _enforce_ type strictness. If the class consuming your code does not enforce type strictness as well, methods called by it will have their parameters silently _coerced_ into the specified type instead of being type checked. [Read this article for more details and examples](https://dev.to/robdwaller/how-php-type-declarations-actually-work-1mm5).
{{% /notice %}}

### Deprecations

Following [Symfony conventions](https://symfony.com/doc/4.4/contributing/code/conventions.html#deprecating-code), method and class deprecations in PrestaShop must be noted by adding the appropriate Phpdoc as well as a deprecation error:

```php
<?php

namespace PrestaShop\Awesome\Path;

@trigger_error(
    sprintf(
        '%s is deprecated since version 8.0 and will be removed in the next major version.',
        MyClass::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated Since 8.0 and will be removed in the next major.
 */
class MyClass
{
    /**
     * @deprecated Since 8.0, use AnotherClass::someNewMethod() instead.
     */
    public function someOldMethod()
    {
        @trigger_error(
            sprintf(
                '%s is deprecated since version 8.0. Use %s instead.',
                __METHOD__,
                AnotherClass::class . '::someNewMethod()'
            ),
            E_USER_DEPRECATED
        );
    }
}
```

If you need to deprecate services, you can use the `deprecated` key for the service:
```yml
    awesome.path.myclass:
        class: 'PrestaShop\Awesome\Path\MyClass'
        deprecated: 'The "%service_id%" service is deprecated since 8.0 and will be removed in next major.'
        public: true
```

## Javascript code conventions

Javascript files MUST follow the [Airbnb Javascript style guide](https://github.com/airbnb/javascript).

You can run the linter to help you comply with these coding standards:

## TypeScript

All `admin-dev/themes/new-theme/js` files are coded in TypeScript. Classes and functions in .ts files must be strictly typed. 

You are able to get global types in the `admin-dev/themes/new-theme/js/types` folder using the `@PSTypes` relative path and some types library are imported from npm using the `@types` namespace and automatically imported by TypeScript.

```bash
npm run lint-fix
```
## HTML, CSS (Sass), Twig & Smarty code conventions

HTML, CSS (Sass), Twig and Smarty files MUST follow the [Mark Otto's coding standards](https://codeguide.co/).
Mark is the creator of the [Bootstrap framework](https://getbootstrap.com/).

To help developers to comply with these conventions, [Stylelint](https://stylelint.io/), a stylesheet linter, has been configured in the PrestaShop project. You can find the configuration file [on this repository](https://github.com/PrestaShop/stylelint-config).

Same as if you want to [compile assets]({{< relref "/8/development/compile-assets" >}}), you need NodeJS and NPM to run Stylelint.

You can run the linter like this:

```bash
npm run scss-lint
```

You can fix auto-fixable errors using this command:

```bash
npm run scss-fix
```

## License information

All PrestaShop files MUST start with the PrestaShop license block:

### Core files

```
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
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
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */
```

### Module files

```
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */
```
