---
title: Basic checks
weight: 1
---

# Basic checks

## Syntax check

Making sure your file is understoodd by PHP is a trivial but critical check.
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

That's why the minimum and maximum compatible PHP versions should be used to check your code. Merchants may use a version that cannot use all
the features integrated in your modules (i.e namespaces, traits, strict typing...).

If some errors are reported, this gives an opportunity :

* to make changes on the module,
* to warn the merchants about the PHP compatibility range.

## Coding standards

Modules follows the same standards as the core (See {{< ref "1.7/development/coding-standards" >}} for more details)