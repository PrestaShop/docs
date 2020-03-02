---
title: Admin controllers
weight: 3
---

# Create Admin module controllers
{{< minver v="1.7.5" title="true" >}}

* Since 1.7.3 you create and override templates and services in your modules.
* Since 1.7.4, you can create and override forms and console commands.
* Since 1.7.5, you can create your own "modern" controllers!

Starting on PrestaShop 1.7.5, you can rely on the modern environment to add new entry points to your applications.

Using modern pages, you will have access to the PrestaShop debug toolbar, the service container, Twig and Doctrine, among others. For your views, the PrestaShop UI Kit is available, built on top of Bootstrap 4 and ensuring your views are consistent with the PrestaShop Back Office.

## How to declare a new Controller

Somewhere in your module declare a new class that will act as a Controller:

```php
// modules/your-module/controller/DemoController.php

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class DemoController extends FrameworkBundleAdminController
{
    public function demoAction()
    {
        return $this->render('@Modules/your-module/templates/admin/demo.html.twig');
    }
}
```

You have access to the Container, to Twig as rendering engine, the Doctrine ORM, everything from Symfony framework ecosystem.
Note that you must return a `Response` object, but this can be a `JsonResponse` if you plan to make a single point application (or "SPA").

{{% notice note %}}
This controller works exactly the same as the Core Back Office ones.
{{% /notice %}} 

You must enable the autoloading for this Controller. For example using a `composer.json` file for your module.

#### Example using PSR-4 namespacing

1. Use namespace for your Controller file

    ```php
    // modules/your-module/controller/DemoController.php
    
    namespace MyModule\Controller;
    
    use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
    ```

2. Configure composer to autoload this namespace

    ```
    {
      "name": "you/your-module",
      "description": "...",
      "autoload": {
        "psr-4": {
          "MyModule\\Controller\\": "controller/"
        }
      },
      "config": {
          "prepend-autoloader": false
      },
      "type": "prestashop-module"
    }
    ```
You should run `composer dumpautoload` console command from where your module's composer.json file is located.

If you do not have "composer" you can search for it. Composer is available on [any operating system](https://getcomposer.org/doc/00-intro.md).

Now we have created and loaded your controller, you need to declare a route. A route map an action of your controller to an URI.

## How to map an action of your controller to a URI

This is really simple (and very well documented in Symfony's [Routing component documentation](https://symfony.com/doc/3.4/routing.html)):

For instance:

```yaml
# modules/your-module/config/routes.yml
your_route_name:
    path: your-module/demo
    methods: [GET]
    defaults:
      _controller: 'MyModule\Controller\DemoController::demoAction'
```

{{% notice tip %}}
Any callable can be used to populate the ``_controller`` attribute, you don't even need to create your own controller! You could even use a public function from your module main class. Even so, we strongly suggest using a controller.
{{% /notice %}}

{{% notice tip %}}
For controllers to link with the routes correctly always use double colon (`::`) and not the single colon (`:`) 
to separate classes and method names! 
Since Symfony 4.1 the bundle notation is going to be deprectated: https://symfony.com/blog/new-in-symfony-4-1-deprecated-the-bundle-notation
{{% /notice %}}

The Controller in the previous example will be available if you browse `/admin-dev/modules/your-module/demo`.
