---
title: "Tutorial: Creating your first module"
menuTitle: "Tutorial"
weight: 1
---

# Tutorial: Creating your first module

{{% notice note %}}
Before you start writing code for your PrestaShop module, we recommend reading PrestaShop's [Coding standards]({{< ref "/8/development/coding-standards" >}}). Configuring your IDE hints or using [automated tools](https://github.com/PrestaShop/php-dev-tools) can help you make sure you follow the project's standards properly.
{{% /notice %}}

Let's create a first simple module, this will allow us to better describe its structure. We will name it **"My module"**.

First, create the module's folder, in PrestaShop's `/modules` folder. Let's call it `mymodule`. This will be the module's "technical" name.

{{% notice tip %}}
Technical names can only accept lower case alphanumeric characters (`[a-z0-9]`). [Although accepted, we strongly discourage using underscores because they don't work with translation domains]({{< ref "/8/modules/creation/module-translation/new-system#translation-domain" >}}).
{{% /notice %}}

This folder must contain the main file, a PHP file of the same name as the folder, which will handle most of the processing: `mymodule.php`.

That is enough for a very basic module. Obviously, more files and folders can be added later, if needed.

## The constant test

The main mymodule.php file must start with the following test:

```php
<?php
if (!defined('_PS_VERSION_')) {
    exit;
}
```

This checks for the presence of an always-existing PrestaShop constant (its version number), and if it does not exist, it stops the module from loading. The sole purpose of this is to prevent malicious visitors to load this file directly.

Note that, as required by PrestaShop's Coding Standards (see above), we do not use a closing PHP tag.

## The main class

The main file must contain the module's main class. 

{{% notice tip %}}
If you need to add more classes later, we suggest writing one single class per file.
{{% /notice %}}

That main class must bear the same name as the module and its folder, in [CamelCase](https://en.wikipedia.org/wiki/CamelCase). In our example: `MyModule`. Furthermore, that class must extend the `Module` class, in order to inherit all its methods and attributes.

```php
<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class MyModule extends Module
{
}
```

It can just as well extend any class derived from Module, for specific needs: `PaymentModule`, `ModuleGridEngine`, `ModuleGraph`, etc.

At this stage, if you place the module's folder on the `/modules` folder, the module can already be seen in the "Module Catalog" page in the back office, in the "Other modules" section – albeit with no real name nor thumbnail.

## The constructor method

Now, let's create the constructor method of the module. Since the constructor is the first method to be called when the module is loaded by PrestaShop, this is the best place to set its details.

```php
<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class MyModule extends Module
{
    public function __construct()
    {
        $this->name = 'mymodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Firstname Lastname';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '8.99.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My module');
        $this->description = $this->l('Description of my module.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }
}
```

Let's examine each line:

```php
$this->name = 'mymodule';
$this->tab = 'front_office_features';
$this->version = '1.0';
$this->author = 'Firstname Lastname';
```

This section assigns a handful of attributes to the class instance (`$this`):

- The `name` attribute serves as an internal identifier (technical name). The value MUST be the same as the module's folder and main class file. Only lower case letters and numbers are accepted.
- The `tab` attribute contains the section that shall contain this module in the Module Manager section in the Back office (see [list of available sections][existing-tab-sections]). We choose `front_office_features` because our module will mostly have an impact on the front-end.
- The `version` attribute contains the version number for the module, displayed in the modules list. We recommend following the [Semantic Versioning specification](https://semver.org/).
- The `author` attribute, as you can imagine contains the author's name. It is displayed as-is in the PrestaShop modules list.

Let's continue with the next line in this block of code:

```php
$this->need_instance = 0;
$this->ps_versions_compliancy = [
    'min' => '1.7.0.0',
    'max' => '8.99.99'
];
$this->bootstrap = true;
```

This section handles the relationship with the module and its environment (namely, PrestaShop):

- The `need_instance` attribute Indicates whether to load the module's class when displaying the "Modules" page in the back office. If set at 0, the module will not be loaded, and therefore will spend less resources to generate the "Modules" page. If your module needs to display a warning message in the "Modules" page, then you must set this attribute to `1`.
- The `ps_versions_compliancy` attribute indicates which version of PrestaShop this module is compatible with. In the example above, we are defining the compatibility range between `1.7.0.0` and `8.99.99`.
- The `bootstrap` attribute indicates that the module's template files have been built with PrestaShop's bootstrap tools in mind.

Next, we call the constructor method from the parent PHP class:

```php
parent::__construct();
```

This will trigger a lot of actions from PrestaShop that you do not need to know about at this point.

This method call must be placed after the definition of `$this->name` variable and before any use of translation.

The next section deals with text strings, which are encapsulated in PrestaShop's translation method, `l()`:

```php
$this->displayName = $this->l('My module');
$this->description = $this->l('Description of my module.');

$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

if (!Configuration::get('MYMODULE_NAME')) {
    $this->warning = $this->l('No name provided.');
}
```

These lines respectively assign:

- A name for the module, which will be displayed in the back office's modules list.
- A description for the module, which will be displayed in the back office's modules list.
- A message, asking the administrator if they really wants to uninstall the module. This is used in the uninstallation process.
- A warning that the module doesn't have its `MYMODULE_NAME` database value set yet (this last point being specific to our example, as we will see later).

The constructor method is now complete. You are free to add more to it later if necessary, but this the bare minimum for a working module.

Now go to your back office's Module Catalog page (found at _"Modules" > "Module Catalog"_) and search "mymodule". The module is visible in the list, with its information displayed – and no icon for now.

You can install the module, but it does not do anything yet.

## Building the install() and uninstall() methods

Some modules have more needs than just using PrestaShop's features in special ways. Your module might need to perform actions on installation, such as checking PrestaShop's settings or to registering its own settings in the database. Likewise, if you changed things in the database on installation, it is highly recommended to change them back (or remove them) when uninstalling the module.

The `install()` and `uninstall()` methods make it possible to control what happens when the store administrator installs or uninstalls the module. They must be included in the main class' block of code (in our example, the `MyModule` class) – at the same level as the constructor method.

### The install() method

Here is the bare minimum for the `install()` method:

```php
public function install()
{
    return parent::install();
}
```

In this first and extremely simplistic incarnation, this method does the minimum needed: return what's returned by the Module class' `install()` method, which returns either `true` if the module is correctly installed, or `false` otherwise. As it is, if we had not created that method, the superclass' method would have been called instead anyway, making the end result identical. Nevertheless, we must mention this method, because it will be very useful once we have to perform checks and actions during the module's installation process: creating SQL tables, copying files, creating configuration variables, etc.

There are many things you can do to expand the `install()` method to perform installation checks. In the following example, we perform the following tasks during installation:

- Check that the [Multistore feature][multistore] is enabled, and if so, set the current context to all shops on this installation of PrestaShop.
- Ensure that the base install process is successful.
- Ensure that the module can be attached to the `displayLeftColumn` hook.
- Ensure that the module can be attached to the `displayHeader` hook.
- Ensure the value of the `MYMODULE_NAME` configuration setting can be set to "my friend".


```php
public function install()
{
    if (Shop::isFeatureActive()) {
        Shop::setContext(Shop::CONTEXT_ALL);
    }

   return (
        parent::install() 
        && $this->registerHook('displayLeftColumn')
        && $this->registerHook('displayHeader')
        && Configuration::updateValue('MYMODULE_NAME', 'my friend')
    ); 
}
```

If any of the lines in the testing block fails, the method returns `false` and the installation is aborted.

### The uninstall() method

The `uninstall()` method follow the same logic as `install()`. Here is the bare minimum implementation:

```php
public function uninstall()
{
    return parent::uninstall();
}
```

Building on this foundation, we want an `uninstall()` method that would delete the data added to the database during the installation (`MYMODULE_NAME` configuration setting). This method would look like this:

```php
public function uninstall()
{
    return (
        parent::uninstall() 
        && Configuration::deleteByName('MYMODULE_NAME')
    );
}
```

## The Configuration object

As you can see, our three blocks of code (`__construct()`, `install()` and `uninstall()`) all make use of a new object, `Configuration`.

This PrestaShop-specific object allows you to easily manage all the shop's settings. It stores its data on the `PREFIX_configuration` database table.

This is a very useful and easy-to-use object, and you will certainly use it in many situations. Most native modules use it too for their own settings.

{{% notice note %}}
You can read more about this component in [Legacy Configuration object]({{< ref "/8/development/components/configuration/backward-compatibility" >}}) and [Configuration storage]({{< ref "/8/development/components/configuration" >}}).
{{% /notice %}}

## The Shop object

The `install()` method also references this:

```php
if (Shop::isFeatureActive()) {
    Shop::setContext(Shop::CONTEXT_ALL);
}
```

As said earlier, here we check if the Multistore feature is enabled, and if so, set the current execution context to "all shops".

The Shop object helps you work with multistore. We will not dive in the specifics here, but will simply present the two methods that are used in this sample code:

- `Shop::isFeatureActive()`: This simply checks whether the multistore feature is active or not, and if at least two stores are presently activated.
- `Shop::setContext(Shop::CONTEXT_ALL)`: This changes the context in order to apply coming changes to all existing stores instead of only the current store.

The Shop Context is explained in more details in the [Multistore documentation][multistore].

## The icon file

To put the finishing touch to this basic module, you should add an icon, which will be displayed next to the module's name in the back office modules list. In case your module has been built for a prominent service, having that service's logo visible brings trust. Make sure you do not use an icon already in use by one of the native modules, or without authorization from the owner of the logo/service.

The icon file must respect these requirements:

- It must be placed on the module's main folder.
- PNG format, 32 by 32 pixels in size.
- Named `logo.png`.

{{% notice tip %}}
There are many free icon libraries available on the web. Here are a few: 

- [Facow's Farm Fresh Web Icons](https://www.fatcow.com/free-icons)
- [Danish Royalty Free](https://iconarchive.com/show/danish-royalty-free-icons-by-jonas-rask.html)
{{% /notice %}}

## Installing the module

You have two options to install a module: from the back office interface or using the Symfony Console component (CLI-base installation)

### Install module from the back office interface

Now that all basics are in place, reload the back office's "Module Catalog" page, in the "Front office features" section, you should find your module. Install it (or reset it if it is already installed).

### Install module from CLI using the Symfony Console component

Access your project's directory with a CLI, and run:

```shell
php bin/console prestashop:module install mymodule
```

Where `mymodule` is your module's name.

To uninstall the module, run the following:

```shell
php bin/console prestashop:module uninstall mymodule
```

For more informations, please read [the reference of the ModuleCommand]({{< ref "/8/development/components/console/prestashop-module" >}})

### The config.xml file

During the module's installation, PrestaShop automatically creates a small `config.xml` file in the module's folder, which stores the module's information. You should be very careful when editing this file by hand.

## Keeping things secure

Once your module is online, its files could be accessed by anyone from the Internet. Even if they cannot trigger anything but PHP errors, you might want to prevent this from happening.

You can achieve this by adding an `index.php` file at the root of any module folder you create. Here is a suggestion for what to put in the file.

```php
<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Location: ../');
exit;
```

[existing-tab-sections]: {{< ref "/8/modules/concepts/module-class/#tab" >}}
[multistore]: {{< ref "/8/development/multistore/" >}}