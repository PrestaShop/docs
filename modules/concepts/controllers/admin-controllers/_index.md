---
title: Admin controllers
weight: 3
---

# Create Admin module controllers

Using modern pages, you will have access to the PrestaShop debug toolbar, the service container, Twig and Doctrine, among others. For your views, the PrestaShop UI Kit is available, built on top of Bootstrap 4 and ensuring your views are consistent with the PrestaShop Back Office.

## How to declare a new Controller 

{{% notice warning %}}
**PrestaShop 9.0+**: The `FrameworkBundleAdminController` is **deprecated** and will be removed in PrestaShop 10.0. Use `PrestaShopAdminController` instead for new controllers.
{{% /notice %}}

In your module, create a new controller class in the `src/Controller/` directory:

```php
<?php
// modules/your-module/src/Controller/DemoController.php

namespace MyModule\Controller;

use PrestaShopBundle\Controller\Admin\PrestaShopAdminController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoController extends PrestaShopAdminController
{
    /**
     * Inject services via constructor for services used across multiple actions
     */
    public function __construct(
        private readonly MyCustomService $myCustomService,
    ) {
    }
    
    /**
     * You can also inject services directly in action methods
     */
    public function demoAction(AnotherService $anotherService): Response
    {
        // Use injected services
        $data = $this->myCustomService->getData();
        $moreData = $anotherService->getMoreData();
        
        return $this->render('@Modules/your-module/templates/admin/demo.html.twig', [
            'data' => $data,
            'moreData' => $moreData,
        ]);
    }
    
    /**
     * You can also use the #[Autowire] attribute to inject services by their ID
     */
    public function advancedAction(
        Request $request,
        ShopRepository $shopRepository,
        #[Autowire(service: 'my_module.custom_service')] $customService,
    ): Response
    {
        // Use the injected service
        $customService->execute();
        
        return $this->render('@Modules/your-module/templates/admin/advanced.html.twig');
    }
    
    /**
     * Use helper methods provided by PrestaShopAdminController
     */
    public function anotherAction(): Response
    {
        // PrestaShopAdminController provides helper methods for common services
        $config = $this->getConfiguration()->get('my_config');
        
        return $this->render('@Modules/your-module/templates/admin/another.html.twig',[
          'my_config' => $config,
        ]);
    }
}
```

The example above demonstrates a complete controller implementation with:
- **Constructor injection** for services used across multiple actions (`MyCustomService`)
- **Method parameter injection** for services used in specific actions (`AnotherService`)
- **Autowire attribute** for injecting services by their ID (`#[Autowire(service: 'my_module.custom_service')]`)
- **Helper methods** provided by `PrestaShopAdminController` for accessing common PrestaShop services

You have access to Twig as rendering engine and everything from the Symfony framework ecosystem.
Note that you must return a `Response` object, but this can be a `JsonResponse` if you plan to make a single page application (or "SPA").

{{% notice note %}}
This controller works exactly the same as the Core Back Office ones.
{{% /notice %}}

{{% notice info %}}
**Accessing PrestaShop services:**

The `PrestaShopAdminController` provides helper methods to access common PrestaShop services:
- `$this->getConfiguration()` - Configuration service
- `$this->getTranslator()` or `$this->trans()` - Translation service
- `$this->getRouter()` - Router service
- `$this->getEmployeeContext()` - Employee context
- `$this->getShopContext()` - Shop context
- `$this->getLanguageContext()` - Language context
- `$this->getCurrencyContext()` - Currency context
- `$this->getCountryContext()` - Country context
- `$this->dispatchCommand()` - Execute CQRS commands
- `$this->dispatchQuery()` - Execute CQRS queries
- `$this->dispatchHookWithParameters()` - Dispatch hooks
- `$this->presentGrid()` - Present grid data

See the complete list in the [PrestaShopAdminController source code](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Controller/Admin/PrestaShopAdminController.php).
{{% /notice %}}

{{% notice warning %}}
**Doctrine repositories must be injected:**

Doctrine ORM is not directly accessible via `$this->getDoctrine()` or similar methods. All Doctrine repositories and entity managers must be injected as dependencies in your controller's constructor or action methods.

Example:
```php
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ProductRepository;

public function __construct(
    private readonly EntityManagerInterface $entityManager,
    private readonly ProductRepository $productRepository,
) {
}
```
{{% /notice %}} 

## Service Configuration

In PrestaShop 9.0, controllers must be defined as services. You have two main approaches to configure your controller service:

The following examples use YAML, but other service configuration files are supported. See [Services]({{< relref "/9/modules/concepts/services/" >}}) for more details.

### Option 1: Explicit service configuration with tags

```yaml
# modules/your-module/config/services.yml
services:
  MyModule\Controller\DemoController:
    autowire: true
    autoconfigure: true
    tags:
      - { name: controller.service_arguments }
```

### Option 2: Using service defaults

```yaml
# modules/your-module/config/services.yml
services:
  _defaults:
    public: false
    autowire: true
    autoconfigure: true
  
  MyModule\Controller\DemoController: ~
```

{{% notice warning %}}
**Service configuration is mandatory:**

One of the two service configuration options above is **essential and required** for your controller to work properly. Without this configuration:
- **The controller will not function** and will throw errors
- Helper methods from `PrestaShopAdminController` will not be accessible
- Services like Twig, Form, Router, and other Symfony components will not be available

**Important:** The service name (e.g., `MyModule\Controller\DemoController`) **must exactly match** the fully qualified class name (FQCN) of your controller. If the service name doesn't match the class name, Symfony and PrestaShop will not be able to identify and instantiate the controller, resulting in errors.

**Understanding the configuration:**
- `autowire: true` - Automatically injects services in constructors and method parameters
- `autoconfigure: true` - Automatically configures the controller as a service and enables all controller features
- `controller.service_arguments` tag - Required if your controller doesn't extend `AbstractController` to enable method parameter injection
{{% /notice %}}

## Autoloading Configuration

You must enable the autoloading for this Controller. For example using a `composer.json` file for your module.

### Example using PSR-4 namespacing

1. Use namespace for your Controller file

    ```php
    <?php
    // modules/your-module/src/Controller/DemoController.php

    namespace MyModule\Controller;

    use PrestaShopBundle\Controller\Admin\PrestaShopAdminController;
    ```

2. Configure composer to autoload this namespace

    ```json
    {
      "name": "you/your-module",
      "description": "...",
      "autoload": {
        "psr-4": {
          "MyModule\\": "src/"
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


## Key Changes in PrestaShop 9.0 (Symfony 6.4)

### Controllers as Services

In Symfony 6.4, controllers must be defined as services. The container passed to controllers is no longer the "global container" but a dedicated, optimized container based on the services injected into it.

**Important implications:**

- The `$this->get('service_name')` method is no longer available in modern controllers
- `FrameworkBundleAdminController` maintains backward compatibility but is **deprecated** and will be removed in PrestaShop 10.0
- New controllers should extend `PrestaShopAdminController` which follows Symfony best practices

### Dependency Injection Methods

You have three main ways to inject services:

1. **Constructor injection** - For services used across multiple actions
2. **Method injection** - For services used in a single action (more optimized)
3. **Autowire attribute** - Use `#[Autowire(service: 'service_id')]` to inject services by their ID

### PrestaShopAdminController Helper Methods

The new base controller provides convenient helper methods for commonly used services:

- `$this->getConfiguration()` - Access configuration service
- `$this->getTranslator()` - Access translator service
- `$this->getRouter()` - Access router service
- `$this->getFlashBag()` - Access flash messages

See the [full list of helper methods](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Controller/Admin/PrestaShopAdminController.php) in the class.

{{% notice info %}}
**Learn more about Symfony controllers:**
- [Controllers as services](https://symfony.com/doc/6.4/controller/service.html)
- [Service Subscribers & Locators](https://symfony.com/doc/6.4/service_container/service_subscribers_locators.html)
- [Service container](https://symfony.com/doc/6.4/service_container.html)
{{% /notice %}}

## Secure your controller

It is safer to define permissions required to use your controller, this can be configured using the `#[AdminSecurity]` attribute and some configuration in your routing file. You can read this documentation if you need more details about [Controller Security]({{< ref "/9/development/architecture/modern/controller-routing.md#security" >}}).

{{% notice note %}}
**PrestaShop 9.0+**: The `@AdminSecurity` annotation has been replaced with the `#[AdminSecurity]` attribute following PHP 8 standards.
{{% /notice %}}
