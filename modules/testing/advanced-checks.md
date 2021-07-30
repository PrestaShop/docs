---
title: Advanced checks
weight: 2
---

# Advanced checks

## Static Analysis

In the previous chapter we dealt with the critical syntax error. Although we made sure it can be read by PHP, errors can exist in it and need to be caught before being sent to production.
Static code analysers are able to detect some of these issues, such as:

* calling an undefined class or method from PHP or your project,
* trying to get the value of an unset variable,
* sending the wrong type of parameter to a method
* having a mismatch between your PHPdoc and your code
* ...

There are three major tools able to analyse your code: PHPStan, Psalm and Phan.

At the time we write this article, only PHPStan is being used on our modules.

### Installation

[PHPStan](https://phpstan.org/) can be installed via composer like other PHP libraries. But, as it can only run by PHP 7.0 and above, you may be unable to add it to your `composer.json` if your PHP requirements are below the version 7.

* **Project requires PHP 7 min**

If the current requirements of your project match PHPStan ones, your may add it directly in your project dependencies.

```bash
composer require --dev phpstan/phpstan
```

* **Project is compliant with PHP 5.x**

Requiring the library in a project that can run on PHP 5.x will trigger compatibility errors from Composer. One workaround is to install it globally, so it can be run from anywhere flawlessly.

```bash
composer global require phpstan/phpstan
```

Another option is to use the Docker image of PHPStan, following the same versioning of the library on Packagist.

```bash
docker run --rm [...] phpstan/phpstan analyse 
```

### Setting up

PHPStan can analyse a standalone project without much configuration, where it only needs the files to analyse.
Some features, like autoloading with composer, are enabled by default.

A module deals with many methods from the core in order to work. To avoid issues like undefined methods and classes, the core needs to be autoloaded in memory each time the module is analysed. PHPStan handles several levels of checks, which are defined in [their documentation page "Rule levels"](https://phpstan.org/user-guide/rule-levels). The higher the better, but somes inconsistencies in the core PHPDoc may prevent you to reach the highest level.

The configuration file stores the parameters that would be sent in the command line otherwise. Having a configuration file is a mandatory step for a module, as we have complex rules to write:

* Files to analyse
* Level of check to run
* PrestaShop constants to set as dynamic
* Potential errors to ignore
* If run with different versions of PS: Do not report ignored messages that aren't reported.

[Their documentation page "Config reference"](https://phpstan.org/config-reference) explains how to write this configuration file from scratch. We also provide a model having some specificities useful for a module. To setup a project with it, require the package `prestashop/php-dev-tools` and call the initialization of PHPStan:

```bash
# Install dependencies
composer require --dev prestashop/php-dev-tools

# Set up configuration files
php vendor/bin/prestashop-coding-standards phpstan:init
```

Files will be copied in the folder `tests/phpstan/` of your module. We provide this library to setup a proper environment for a module, for instance to handle constants that are only defined when PrestaShop is installed. If only the source is downloaded in your test environment, the configuration we provide will use an extension file defining these constants for you. In the next version of this library, we expect more rules to be added to avoid false positive issues and add pertinent errors in a module context.

### Usage

Running PHPStan can be done in several ways, and depends on the way you installed it. But in all cases, an environment variable `_PS_ROOT_DIR_` must be set, targeting the PrestaShop root folder.

* **Project requires PHP 7 min**

```bash
_PS_ROOT_DIR_=/var/www/html vendor/bin/phpstan analyse --configuration=tests/phpstan/phpstan.neon
```

* **Project is compliant with PHP 5.x**

  * Via Composer global dependencies

    PrestaShop is considered to be present in the folder `/var/www/html`. PHPStan can be found in your global composer folder, available from the home directory.

    ```bash
    _PS_ROOT_DIR_=/var/www/html ~/.config/composer/vendor/bin/phpstan analyse --configuration=tests/phpstan/phpstan.neon
    ```

    or

    ```bash
    _PS_ROOT_DIR_=/var/www/html ~/.composer/vendor/bin/phpstan analyse --configuration=tests/phpstan/phpstan.neon
    ```

  * Via Docker

    ```bash
    # Create a container with PrestaShop files
    docker run -tid --rm -v ps-volume:/var/www/html --name temp-ps prestashop/prestashop

    # Run the PHPStan image with all the volumes available to read the module and the core files
    docker run --rm --volumes-from temp-ps -v $PWD:/web/module -e _PS_ROOT_DIR_=/var/www/html --workdir=/web/module phpstan/phpstan analyse --configuration=/web/module/tests/phpstan/phpstan.neon
    ```


Here is an example of output. In that case, we were using PHPStan on a module with the latest version of PrestaShop, and tried to run it with a old PS 1.7 version (1.7.0.3), so we could assert that all the methods we call exist in the project and we won't encounter compatibility issues:

```
$ _PS_ROOT_DIR_=/var/www/html vendor/bin/phpstan analyse --configuration=tests/phpstan/phpstan.neon

 ------ ------------------------------------------------------------------ 
  Line   controllers/admin/AdminAjaxPoppromoController.php                 
 ------ ------------------------------------------------------------------ 
  428    Call to an undefined static method ImageType::getFormatedName().  
 ------ ------------------------------------------------------------------ 

 [ERROR] Found 1 error      
 ```

PHPStan allowed us to know that a method disappeared in the first 1.7 versions of PrestaShop, although it was found on PS 1.6 and went back in later versions.

## Unit tests

Having unit tests on a module can be challenging because of the relations between your code and PrestaShop's (i.e ObjectModels, context, Database instance). Even though the full coverage of a module cannot be reached, there is some business logic which can be isolated and tested.

The main tools used for unit testing is [PHPUnit](https://phpunit.de/). 

Like other PHP testing tools, it can be installed in your project with composer. Take care to install it in your **development dependencies** to avoid distributing in your production releases.

```bash
composer require --dev phpunit/phpunit:5.7
```

While newer versions of PHPUnit exist, the version chosen in your project must match the PHP compatibility range of the project, otherwise composer will refuse to install it. The version provided in the example above is the last one compatible with PHP 5.6.

Creating your unit tests can be done the same way as the core, so more details can be found in 
the chapter [Testing of the core]({{< ref "1.7/testing/how-to-create-your-own-unit-tests" >}}).

Supposing it was installed via Composer, the command to run it is:

```
php vendor/bin/phpunit tests
```

The following example provides the output expected by this tool when 19 unit tests have been created in the `tests/` folder and pass:

```
$ php vendor/bin/phpunit tests
PHPUnit 5.7.27 by Sebastian Bergmann and contributors.

...................                                19 / 19 (100%)

Time: 40 ms, Memory: 4.00MB

OK (19 tests, 28 assertions)
```
