---
title: Front controllers
weight: 2
---

# Front controllers

These class are accessible from the front-office and add features to the
customers.

## Creating a front controller

In order to have a front controller read by PrestaShop, these 3 rules have
to be followed:

* it is stored in the subfolder `controllers/front/` of the module.
* in CamelCase, the class name follows this format: `<ModuleClassName><FileName>ModuleFrontController`.
* it extends the class `ModuleFrontController`.

### Minimum controller example

Let's say we want a controller responsible of payments validation in our
module `cheque`.

We create a file `/modules/cheque/controllers/front/validation.php` and its class:

```php
<?php
/**
 * <ModuleClassName> => Cheque
 * <FileName> => validation.php
 * Format expected: <ModuleClassName><FileName>ModuleFrontController
 */
class ChequeValidationModuleFrontController extends ModuleFrontController
{
}
```

That's all, methods added to the class will be taken in account by PrestaShop
automatically.

## Available properties

The controllers added in a module extend [`ModuleFrontController`](https://github.com/PrestaShop/PrestaShop/blob/8.0.0/classes/controller/ModuleFrontController.php), itself extending [`FrontController`](https://github.com/PrestaShop/PrestaShop/blob/8.0.0/classes/controller/FrontController.php) & [`Controller`](https://github.com/PrestaShop/PrestaShop/blob/8.0.0/classes/controller/Controller.php).
They provide access to the environment in which they run.

* `$this->module` is the instance of the module responsible of the controller.
* `$this->context` delivers the result of `Context::getContext()`.

Other existing properties may be useful and can be discovered by looking at the parent classes content (by following links above) or with `dump($this)`.

## Adding methods to the controller

There are basically two kinds of HTTP calls possible for a controller:

* Calls with GET, used to only retrieve data,
* Calls with POST, used as soon as some data is modified on the shop.

For an advanced use, others HTTP methods can also be called ( such as PUT, PATCH, DELETE ).

Depending of the request made to the controller, a different method will be
called by the core.

### Display content

Handling requests can be done by implementing the method `initContent()` in
the front controller. Note the parent class also implements it, do not forget
to call it as well.

Its purpose should be assigning the variables to smarty, and setting the
template to be displayed.

#### Assign variables to smarty

The smarty engine is available in the `context` property of the controller.
Assigning variables can be done with its method `assign(array $vars)`.

```php
<?php
public function initContent()
{
  // In the template, we need the vars paymentId & paymentStatus to be defined
  $this->context->smarty->assign(
    array(
      'paymentId' => Tools::getValue('id'), // Retrieved from GET vars
      'paymentStatus' => [...],
    ));
}
```

#### Display HTML content

This is the second part we expect in the method `initContent()`.

HTML content should be stored in a smarty template, available in
the module subfolder `views/templates/front/`.

The method `setTemplate(...)` expect the template file name as parameter. There is no
need to write its complete path, as PrestaShop expects to find it in the folder
`views/templates/front/` of the same module.

```php
<?php
public function initContent()
{
  // In the template, we need the vars paymentId & paymentStatus to be defined
  $this->context->smarty->assign(
    array(
      'paymentId' => Tools::getValue('id'), // Retrieved from GET vars
      'paymentStatus' => [...],
    ));

  // Will use the file modules/cheque/views/templates/front/validation.tpl
  $this->setTemplate('module:cheque/views/templates/front/validation.tpl');
}
```

### Handle actions (POST)

POST requests will be managed from the method `postProcess()`.

It does not receive parameters and does not expect any value to be returned,
but user input can be checked with `Tools::getIsset(...)` and retrieved with
`Tools::getValue(...)`.

When done, controllers generally redirects to another route, by using
`Tools::redirect(<url>)`.


## Accessing a module front controller

Addresses to your controller can be generated easily with the class `Link`:

```php
<?php
public function Link::getModuleLink($module, $controller, array $params = array());
```

`$module` is the technical name of the module, `$controller` is the controller
file name (without '.php'), and `$params` is an array of variables to add in a
customized route or simply as GET params.

The generated address handles automatically HTTP or HTTPS environments, with or
without URL rewriting.

### Example of method calls

```php
<?php
Context::getContext()->link->getModuleLink('cheque', 'validation', array('idPayment' => 1337));
```

* Without URL rewriting: `http://<shop_domain>/index.php?idPayment=1337&fc=module&module=cheque&controller=validation&id_lang=1`
* With URL rewriting: `http://<shop_domain>/en/module/cheque/validation?idPayment=1337`

### Ajax request

When you call controller via AJAX, you need to add `ajax` parameter in the url.

```php
Context::getContext()->link->getModuleLink('cheque', 'validation', array('idPayment' => 1337, 'ajax'=>true));
```

* Without URL rewriting: `http://<shop_domain>/index.php?idPayment=1337&fc=module&module=cheque&controller=validation&id_lang=1&ajax=true`
* With URL rewriting: `http://<shop_domain>/en/module/cheque/validation?idPayment=1337&ajax=true`

## Restricting access

### Logged customers only

Set the property `$auth` to `true` if you want guests to be redirected to the
login page automatically.

```php
<?php
public $auth = true;
public $guestAllowed = false;
```

### To everybody, temporarily

You can force the maintenance page to be displayed when a customer reaches a controller.

```php
<?php
protected $maintenance = true;
```

### Non-SSL calls

When SSL is enabled to a shop, you can force a call to a controller to be
secured by redirecting it to HTTPS.

```php
<?php
public $ssl = true;
```

## Execution order of the controller’s functions

  * **__construct()**: Sets all the controller’s member variables.
  * **init()**: Initializes the controller.
  * **setMedia()** or **setMobileMedia()**: Adds all JavaScript and CSS specifics to the page so that they can be combined, compressed and cached (see PrestaShop’s CCC tool, in the back office “Performance” page, under # the “Advanced preferences” menu).
  * **postProcess()**: Handles ajaxProcess.
  * **initHeader()**: Called before initContent().
  * **initContent()**: Initializes the content.
  * **initFooter()**: Called after initContent().
  * **display()** or **displayAjax()**: Displays the content.

## Using a front controller as a cron task

Thanks to Symfony, modules may implement [Console commands](https://symfony.com/doc/current/console.html) for cron tasks.

For modules compatible with early versions of PrestaShop 1.7 and previous major versions, there is no dedicated handler for CLI calls. A workaround is available with front controllers containing specific checks for CLI calls.

Implementing a controller instead of a simple PHP script will allow you to 
avoid some issues such as a non-instanciated Context or Symfony Kernel,
especially on the latest versions of PrestaShop (i.e display of prices from PS 1.7.6).
That's why, even for CLI calls triggered by a cron jobs, we recommend having a
controller. The trick is to define it as an Ajax call to prevent the page
template to be displayed.

The following code provides a base for a cron task in the module `examplemodule`.

**modules/examplemodule/controllers/front/cron.php**

```php
<?php
class ExampleModuleCronModuleFrontController extends ModuleFrontController
{
    /** @var bool If set to true, will be redirected to authentication page */
    public $auth = false;

    /** @var bool */
    public $ajax;

    public function display()
    {
        $this->ajax = 1;

        if (php_sapi_name() !== 'cli') {
            $this->ajaxRender('Forbidden call.');
        }

        // Additional token checks

        // ...

        $this->ajaxRender("hello\n");
    }
}
```

This controller can now be triggered by creating a PHP file that initiates the route to the controller, then includes the index.php at the root of PrestaShop in order to init the dispatcher and your controller.

This kind of script is also useful if a standalone PHP script interacting with PrestaShop has been migrated to a ModuleFrontController. The URLs to call would change by moving into a Controller, but the old one would be still accessible with this workaround.

**modules/examplemodule/cron.php**

```php
<?php
$_GET['fc'] = 'module';
$_GET['module'] = 'examplemodule';
$_GET['controller'] = 'cron';

require_once dirname(__FILE__) . '/../../index.php';
```

The code is now callable via the php command on a terminal:

```bash
$ php modules/examplemodule/cron.php 
hello
```
