---
title: Basic checks
weight: 1
---

# Basic checks

## Syntax check

First of all, making sure your file is understood by PHP is a trivial but critical check.
PHP provides a linter to verify a file can be run:

```bash
$ php -l  <file>
        Syntax check only (lint)
```

The linter can be run on a whole project if a list of files to check is created. On a Linux bash, this command looks for all the PHP files (except in folders `vendor` and `tests`) then runs the linter on each of them:

```bash
find . -type f -name '*.php' ! -path "./vendor/*" ! -path "./tests/*" -exec php -l -n {} \; | (! grep -v "No syntax errors detected")
```

The linter should be run with different PHP version that are compatible with your module.
Let's consider this example, defining an empty array and dumping it:

**test.php**
```php
<?php

$myVar = [];
var_dump($myVar);
```

Running the linter on this file from PHP 5.4 would return `No syntax errors detected in test.php`, while PHP 5.3 displays the following error:

```
Parse error:  syntax error, unexpected '[' on line 3
```

That's why the minimum and maximum compatible PHP versions should be used to check your code. Merchants may use a version that cannot run all
the code written in your modules (i.e namespaces, traits, strict typing...).

If some errors are reported by this tool, this gives you the opportunity :

* to make changes on the module
* to warn the merchants about the PHP compatibility range

## Coding standards

Modules follows the same rules as the core. The [coding standards chapter]({{< ref "8/development/coding-standards" >}}) of this project provides more details about it.

Following the same rules as the core requires the configuration file to be available in your project. These rules are distributed and maintained on a repository 
`prestashop/php-dev-tools` available on [Packagist](https://packagist.org/packages/prestashop/php-dev-tools) which can be required via composer.

```bash
# Install dependencies
composer require --dev prestashop/php-dev-tools

# Set up configuration files
php vendor/bin/prestashop-coding-standards cs-fixer:init
```

These commands install and prepare your project for php-cs-fixer and the core standards. The commands have run successfully if a file `.php_cs.dist` exists in the root folder.

[PHP-CS-Fixer](https://packagist.org/packages/friendsofphp/php-cs-fixer) is used to check the code style, and is automatically included in your project if you required `prestashop/php-dev-tools` by following the commands above.

It provides two main features:

* Fixing automatically the coding standards problem found in the code,
* Reporting these errors without fixing them, useful in a continuous integration context (with `--dry-run`).

Supposing it was installed via Composer, the command to run it is:

```bash
php vendor/bin/php-cs-fixer fix [--dry-run]
```

This example provides the output expected by this tool, here with a file requiring changes:

```
$ php vendor/bin/php-cs-fixer fix --dry-run
Loaded config PrestaShop coding standard from "<path_to_your_module>/.php_cs.dist".
Using cache file ".php_cs.cache".
   1) controllers/front/TheController.php

Checked all files in 0.085 seconds, 12.000 MB memory used
```

## License headers

When the extension is open-source, sharing the license is one important task.

[Header-Stamp](https://github.com/PrestaShopCorp/header-stamp) is a tool that applies a header on all compatible files (PHP, JS...).
In these headers, details can be found about the author, the license, the original year of publication.
One command will apply the license header to all your files, or update it as necessary.

This tool is part of `prestashop/php-dev-tools` available on [Packagist](https://packagist.org/packages/prestashop/php-dev-tools), which can be required via composer.

### Example

In the following example, the AFL license is going to be applied on a module. 

The Header-Stamp package already includes an AFL template, so we can use that one. We also have a few folders that we will want to ignore: `vendor` (because libraries have their own license), `test`, and `_dev` (because they won't be part of the release package).

To install and use the tool:

```bash
# Install header-stamp
composer require --dev prestashop/php-dev-tools

# Apply header block
php vendor/bin/header-stamp --license=vendor/prestashop/header-stamp/assets/afl.txt --exclude=vendor,tests,_dev
```

To return the list of files that would be updated because their header block is missing or different from the one to apply, use the `--dry-run` parameter:

```bash
php vendor/bin/header-stamp --license=vendor/prestashop/header-stamp/assets/afl.txt --exclude=vendor,tests,_dev --dry-run
```
