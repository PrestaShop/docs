---
title: Override or decorate a Core controller
---

# Override or decorate a Core controller

{{< minver v="1.7.7" title="true" >}}

If you want to extend the behavior of a Back Office page in PrestaShop, you have multiple options.

Most of standard extension needs can be fulfilled using one [hook][hooks].

If there is no hook available for your need, and you only need to modify the display of the page, you might want to [override the template][template-override].

But sometimes you want to modify the page deeper. You need to modify the controller behavior.

If the Back Office page you want to modify is powered by Symfony, you have 3 options:

- remap the route to target a new Controller you create
- override the existing Core controller
- decorate the existing Core controller

## Remap the routing

In Symfony, [routes](https://symfony.com/doc/3.4/routing.html) such as `/sell/catalog/orders` are mapped to controllers by YAML configuration files such as this one:
```yaml
admin_orders_index:
  path: /sell/orders/orders/
  methods: [GET]
  defaults:
    _controller: PrestaShopBundle:Admin/Sell/Order/Order:index
    _legacy_controller: AdminOrders
    _legacy_link: AdminOrders
```

In your module, you have the possibility to replace this configuration item by your own.

So for example if you want that people browsing the Back Office on URL `/sell/orders/orders/` hit your own controller `MyModule\Controller\DemoController`, you can do this:
```yaml
# modules/your-module/config/routes.yml
admin_orders_index:
    path: /demo/orders
    methods: [GET]
    defaults:
      _controller: 'MyModule\Controller\DemoController::demoAction'
```

{{% notice warning %}}
Keep the items `_legacy_controller` and `_legacy_link` as they are necessary to enable matching with legacy URL `index.php?controller=AdminOrders` and modern URL `/sell/orders/orders/`
{{% /notice %}}

Thanks to this, whenever an HTTP request is matched to the route `admin_orders_index`, then your controller `demoAction()` will be executed.

All module routes are prefixed with `modules`, which is why the URL of this remapped route is `modules/demo/orders`.

{{% notice tip %}}
Routing is computed and cached by Symfony. You will probably need to clear this cache for Symfony to acknowledge your updated routing.
You can do it by using `php bin/console cache:clear`
{{% /notice %}}

{{% notice tip %}}
if you have trouble writing the right routing configuration for your controller, you can use Symfony debugger to dump the routes with `php bin/console debug:router`
{{% /notice %}}

## Override the controller

Since 1.7.7, PrestaShop Back Office controllers are registered as services, and services can be [overridden][override-services].

For example, the controller responsible for the page "Improve > Design > CMS Pages" is registered with service ID `PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController`.

With the following configuration item, we can override this configuration to make it target our custom module
```yaml
# modules/your-module/config/services.yml
  'PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController':
    class: MyModule\Controller\DemoController

```

Thanks to this, whenever Symfony forwards a request to the Core controller `PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController` it will be forwarded to `DemoController` instead.

{{% notice tip %}}
if you have trouble writing the right service configuration for your controller, you can use Symfony debugger to dump the routes with `php bin/console debug:container`. It can also be helpful to find the service ID of the controller.
{{% /notice %}}

## Decorate the controller

However overriding a controller or a service is usually not recommanded, because this means you completely rewrite its behavior. If the implementation is updated in later versions of PrestaShop, your override will ignore these updates, which might create bugs.

It is better to use [decoration](https://symfony.com/doc/3.4/service_container/service_decoration.html) which keeps the behavior of the decorated controller while allowing you to extend its behavior by modiying received inputs and outputs.

Back to the controller responsible for the page "Improve > Design > CMS Pages" which is registered with service ID `PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController`.

With the following configuration item, we can decorate it with a custom controller in our module:
```yaml
# modules/your-module/config/services.yml
  custom_controller:
    class: MyModule\Controller\DemoController
    decorates: PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController
    arguments: ['@custom_controller.inner']
```

Thanks to this, whenever Symfony forwards a request to the Core controller `PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController` it will be forwarded to `DemoController` instead. But what is different with overriding is that the decorated CmsPageController is injected into the constructor of DemoController, and we can use it:
```php
<?php

namespace MyModule\Controller;

use PrestaShop\PrestaShop\Core\Search\Filters\CmsPageCategoryFilters;
use PrestaShop\PrestaShop\Core\Search\Filters\CmsPageFilters;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController;
use Symfony\Component\HttpFoundation\Request;

class DemoController extends FrameworkBundleAdminController
{
    /**
     * @var CmsPageController
     */
    private $decoratedController;

    public function __construct(CmsPageController $decoratedController)
    {
        $this->decoratedController = $decoratedController;
    }

    public function indexAction(CmsPageCategoryFilters $categoryFilters, CmsPageFilters $cmsFilters, Request $request)
    {
        return $this->decoratedController->indexAction($categoryFilters, $cmsFilters, $request);
    }
}
```
In this example I do nothing else than returning the exact output from the decorated controller.
However I could modify the input request or I could modify the output given by decorated controller before returning it. Example:
```php
    public function indexAction(CmsPageCategoryFilters $categoryFilters, CmsPageFilters $cmsFilters, Request $request)
    {
        $output = $this->decoratedController->indexAction($categoryFilters, $cmsFilters, $request);

        $myService = $this->getMyPaymentService();
        $output = $this->injectMyData($myService, $output);

        return $output;
    }
```


{{% notice tip %}}
if you have trouble writing the right service configuration for your decoration, you can use Symfony debugger to dump the routes with `php bin/console debug:container`. It can also be helpful to find the service ID of the controller.
{{% /notice %}}

[hooks]: {{< ref "/1.7/modules/concepts/hooks" >}}
[template-override]: {{< ref "/1.7/modules/concepts/templating/admin-views" >}}
[override-services]: {{< ref "/1.7/modules/concepts/services" >}}