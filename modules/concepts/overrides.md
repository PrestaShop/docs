---
title: Overrides
weight: 6
---

# Overrides

Overriding is a way to "override" class files and controller files. PrestaShop's ingenious class auto-loading function makes the "switch" to other files fairly simple. Thanks to PrestaShop's fully object-oriented code, you can rely on object inheritance to modify and add new behaviors, using the properties and methods of the various existing classes.

## Important note

{{% notice warning %}}
There are limitations and risks of using overrides. Keep them for your own shop.
{{% /notice %}}

Overrides in PrestaShop are exclusive. This means that if your module overrides one of PrestaShop’s behaviors, another module will not be able to use that behavior properly, or override it in an predictable way.

Therefore, overrides should only be used for your own local modules, when you have a specific need that cannot be applied with it.

It is not recommended to use an override in a module that you intend to distribute (for instance through the PrestaShop Addons marketplace), and they are forbidden in partner modules.

## Alternatives to overrides

Before creating an override, check the existing features can help you:

### Hooks

There are many events triggered on each controller of PrestaShop. They can be used
for displaying additional content or executing module actions.

See [the hooks chapter]({{< ref "8/modules/concepts/hooks/" >}}) for more details.

### Classes

If a class does not make what a module expects, you can extend it in a module for improvement.

For instance you could have a single Tools class for core and module helper methods:

```php
<?php
class MyCustomTools extends Tools
{
    /**
     * Adding a new method for the example
     */
    public static function array_pluck(array $data, 'property')
    {
        // [...]
    }
}
```

Once included in another file, all these following method would be callable:

```php
<?php
MyCustomTools::array_pluck($data, 'id');
MyCustomTools::getValue('userId'); // Defined in Tools
MyCustomTools::getShopDomain(); // Defined in Tools
```

### Controllers

Core controllers can be reused in a module as well, without being erased, thanks to inheritance.

This allows a controller to be maintained easily, with its own identity but with the parent features.

See [the controllers chapter]({{< ref "8/modules/concepts/controllers/" >}}) for more details.

### Service overrides

PrestaShop is migrating to Symfony, and the parts migrated rely on Symfony container which enables service overrides and decorations. This is similar to overrides but avoids class erasing.

See [the Symfony services chapter]({{< ref "8/modules/concepts/services/" >}}) for more details.

### Contributing

Sometimes, the existing features may not be enough for your needs.
An event can be missing, or a controller method should be probably better in a dedicated class to be accessible.

If you think some changes in the core would be useful for the community, we encourage you to suggest them on the
[PrestaShop source code](https://github.com/PrestaShop/PrestaShop) with a pull request.

By doing so, you may cover long-term needs the core developers probably don't know about.


## Class & controller override

If you don't have any other choice, classes and controllers are usually built following a certain norm.

Here is the core Product class and controller:

* `/classes/Product.php`. The class is called ProductCore.
* `/controllers/front/ProductController.php`. The controller class is called ProductControllerCore.

You will need to create a PHP file and place it either of the override folders of a module.
Indeed, since PrestaShop 1.5, these files can be stored within a module and their management will follow it.

Overriding a class does not mean to copy paste the whole file content.
As long as you extend the core equivalent class, you are free to override only one method or as many as you need.

### Overriding a class

In order to override the Product class, your file needs to be called Product.php and must feature a Product class that then extends ProductCore class.

The file should be placed in this module location:

`/modules/<module_name>/override/classes/Product.php`.

It will be copied in `/override/classes/Product.php` during the module installation, and removed automatically on uninstall.

{{% notice %}}

There is an example module that overrides `Manufacturer` and adds a field to database. See [DemoOverrideObjectModel](https://github.com/PrestaShop/example-modules/tree/master/demooverrideobjectmodel). Note that **it is always recommended creating custom table and use custom ObjectModel instead of override**.

{{% /notice %}}

### Overriding a controller

In order to override the ProductController class, your file needs to be called ProductController.php and must feature a ProductController class that then extends ProductControllerCore class.

The file should be placed in this module location:

`/modules/<module_name>/override/controllers/front/ProductController.php`.

It will be copied in `/override/controllers/front/ProductController.php` during the module installation, and removed automatically on uninstall.

### Example

Let's consider the file `/modules/<module_name>/override/classes/controllers/FrontController.php`, overriding only one method of the core file.

```php
<?php
/*
 * With this override, you have a new Smarty variable called "currentController" available in header.tpl
 * This allows you to use a different header if you are on a product page, category page or home.
 */
class FrontController extends FrontControllerCore {
    public function initHeader()
    {
        self::$smarty->assign('currentController', get_class($this));
        return parent::initHeader();
    }
}
```

## Override a module

Since version 1.6.0.11 of PrestaShop, a new feature is available that allows developers to override some parts of the modules.
Despite a module having different files, the main one, additional classes, etc., you can override the main file, and ModuleFrontController (note: this is available since 1.7.2.0) based files.

### Override module's main class by extending it

To override a module's instance class, you have to extend it, giving the extended class the same name and adding the `Override` suffix:

```php
class BlockUserInfoOverride extends BlockUserInfo
{
	public function hookDisplayNav($params)
	{
                 // This is only an example, please do not use HTML here :-)
		return '<div class="header_user_info"><a>Test</a></div>';
	}
}
```

You must put the file in `/override/modules/blockuserinfo/blockuserinfo.php`

After adding an override, don't forget to clean the cache. You can do it from the back office or by CLI using the Symfony console.

You may even create a module that overrides other modules! For instance:
`/modules/mymodule/override/modules/blockuserinfo/blockuserinfo.php` will be copied to `/override/modules/blockuserinfo/blockuserinfo.php` during the installation of the `mymodule` module. However, this is not recommended, since the exact usage of a module to be overridden is unknown and may be different in a particular shop.

### Override module front/admin controllers classes by extending them

To override a module's front/admin controller class, you have to extend it, giving the extended class the same name and adding the `Override` suffix:

```php
class AdminBlockListingControllerOverride extends AdminBlockListingController
{
	public function displayAjaxSaveColor()
	{
		//This is just an example
                $color1 = "red";
        	$color2 = Tools::getValue('color2');
        	$result = false;

        	if (!empty($color1) && !empty($color2)) {
           	 $result = Configuration::updateValue('PSR_ICON_COLOR', $color1)
                	&& Configuration::updateValue('PSR_TEXT_COLOR', $color2);
        	}

        	// Response
        	$this->ajaxRenderJson($result ? 'success' : 'error');
	}
}
```

You must put the file in `/override/modules/blockreassurance/controllers/admin/AdminBlockListingController.php`

After adding an override, don't forget to clean the cache. You can do it from the back office or by CLI using the Symfony console.

The previous example is applied to an admin controller, but the same process can be used for front controllers too.

You may even create a module that overrides other modules! For instance:
`/modules/mymodule/override/modules/blockreassurance/controllers/admin/AdminBlockListingController.php` will be copied to `/override/modules/blockreassurance/controllers/admin/AdminBlockListingController.php` during the installation of the `mymodule` module. However, this is not recommended, since the exact usage of a module to be overridden is unknown and may be different in a particular shop.

## Theme template override

Overriding a theme from a module is **NOT** possible, and never will.
If you need this, you have to look instead at the parent/child theme feature.

However, a module template or asset can be overriden by a theme,
but this is not covered by this chapter specific to modules development.
