---
title: Admin controllers
weight: 3
---

# Create Admin module controllers

Using modern pages, you will have access to the PrestaShop debug toolbar, the service container, Twig and Doctrine, among others. For your views, the PrestaShop UI Kit is available, built on top of Bootstrap 4 and ensuring your views are consistent with the PrestaShop Back Office.

## How to declare a new Controller 

Somewhere in your module declare a new class that will act as a Controller:
```php
<?php
// modules/your-module/src/Controller/DemoController.php

namespace MyModule\Controller;

use Doctrine\Common\Cache\CacheProvider;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class DemoController extends FrameworkBundleAdminController
{
    private $cache;
       
    // you can use symfony DI to inject services
    public function __construct(CacheProvider $cache)
    {
        $this->cache = $cache;
    }
    
    public function demoAction()
    {
        return $this->render('@Modules/your-module/templates/admin/demo.html.twig');
    }
}
```

If you want Symfony Dependency Injection to inject services into your controller, you need to use specific YAML service declaration:
```yaml
services:
  # The name of the service must match the full namespace class
  MyModule\Controller\DemoController:
    class: MyModule\Controller\DemoController
    arguments:
      - '@doctrine.cache.provider'
```

You can also retrieve services with the container available in symfony controllers ->
```php
<?php
// modules/your-module/src/Controller/DemoController.php

namespace MyModule\Controller;

use Doctrine\Common\Cache\CacheProvider;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class DemoController extends FrameworkBundleAdminController
{
    public function demoAction()
    {
        // you can also retrieve services directly from the container
        $cache = $this->container->get('doctrine.cache');
        
        return $this->render('@Modules/your-module/templates/admin/demo.html.twig');
    }
}
```

You have access to the Container, to Twig as rendering engine, the Doctrine ORM, everything from Symfony framework ecosystem.
Note that you must return a `Response` object, but this can be a `JsonResponse` if you plan to make a single page application (or "SPA").

{{% notice note %}}
This controller works exactly the same as the Core Back Office ones.
{{% /notice %}} 

You must enable the autoloading for this Controller. For example using a `composer.json` file for your module.

#### Example using PSR-4 namespacing

1. Use namespace for your Controller file

    ```php
    <?php
    // modules/your-module/src/Controller/DemoController.php
    
    namespace MyModule\Controller;
    
    use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
    ```

2. Configure composer to autoload this namespace

    ```json
    {
      "name": "you/your-module",
      "description": "...",
      "autoload": {
        "psr-4": {
          "MyModule\\Controller\\": "src/Controller/"
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

This is really simple (and very well documented in Symfony's [Routing component documentation](https://symfony.com/doc/4.4/routing.html)):

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
Since Symfony 4.1 the bundle notation is going to be deprecated: https://symfony.com/blog/new-in-symfony-4-1-deprecated-the-bundle-notation
{{% /notice %}}

The Controller in the previous example will now be available if you browse `/admin-dev/modules/your-module/demo`. Pay attention to this path: it starts with `/modules`.

This is because all module routes are, by default, prefixed with `/modules`.

### Disabling the prefix

If however you need or wish your route not to be prefixed, you can use the `_disable_module_prefix` route option to disable the prefix.

```yaml
# modules/your-module/config/routes.yml
your_route_name:
    path: your-module/demo
    methods: [GET]
    defaults:
      _controller: 'MyModule\Controller\DemoController::demoAction'
      _disable_module_prefix: true
```


### Generating the URI of a back-office controller inside a module

Valid URIs required a security token.

In order to generate the valid URI of a controller you created from inside the main module class, you need to get the Symfony router. The router will build the URI using `generate` with the route name, as in the below example.

```php
    <?php
    # modules/my-module/my-module.php

    use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

    class MyModule extends Module
    {
        protected function generateControllerURI()
        {
               $router = SymfonyContainer::getInstance()->get('router');

               return $router->generate('my_route_name');
        }
    }
```


## Secure your controller

It is safer to define permissions required to use your controller, this can be configured using the `@AdminSecurity` annotation and some configuration in your routing file. You can read this documentation if you need more details about [Controller Security]({{< ref "/1.7/development/architecture/migration-guide/controller-routing.md#security" >}}).
