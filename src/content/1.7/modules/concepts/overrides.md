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

See [the hooks chapter]({{< ref "1.7/modules/concepts/hooks/" >}}) for more details.

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

See [the controllers chapter]({{< ref "1.7/modules/concepts/controllers/" >}}) for more details.

### Service overrides

PrestaShop is migrating to Symfony, and the parts migrated rely on Symfony container which enables service overrides and decorations. This is similar to overrides but avoids class erasing.

See [the Symfony services chapter]({{< ref "1.7/modules/concepts/services/" >}}) for more details.

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

## Theme template override

Overriding a theme from a module is **NOT** possible, and never will.
If you need this, you have to look instead at the parent/child theme feature.

However, a module template or asset can be overriden by a theme,
but this is not covered by this chapter specific to modules development.
