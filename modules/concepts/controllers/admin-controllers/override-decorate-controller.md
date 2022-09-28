---
title: Override or decorate a Core controller
---

# Override or decorate a Core controller

{{< minver v="1.7.7" title="true" >}}

If you want to extend the behavior of a Back Office page in PrestaShop, you have multiple options.

Most of standard extension needs can be fulfilled using one [hook][hooks].

If there is no hook available for your need, and you only need to modify the visual appearance of the page, you might want to [override a template][template-override].

But sometimes you want to modify the page in a deeper way. In this case, you need to modify the controller's behavior.

If the Back Office page you want to modify is powered by Symfony, you have 3 options:

- Remap the route to target a new Controller you created
- Override the existing Core controller
- Decorate the existing Core controller

## Remap the route

In Symfony, [routes](https://symfony.com/doc/4.4/routing.html) such as `/sell/orders/orders` are mapped to controllers by YAML configuration files such as this one:
```yaml
# src/PrestaShopBundle/Resources/config/routing/admin/sell/orders/orders.yml
admin_orders_index:
  path: /sell/orders/orders/
  methods: [GET]
  defaults:
    _controller: PrestaShopBundle:Admin/Sell/Order/Order:index
    _legacy_controller: AdminOrders
    _legacy_link: AdminOrders
```

In your module, you have the possibility to replace this configuration item by your own.

So for example, if you want that people browsing the Back Office on URL `/sell/orders/orders/` to hit your own controller `MyModule\Controller\DemoController` instead of the Core's, you can do this:
```yaml
# modules/your-module/config/routes.yml
admin_orders_index:
    path: /sell/orders/orders/
    methods: [GET]
    defaults:
      _controller: 'MyModule\Controller\DemoController::demoAction'
      _disable_module_prefix: true
```

{{% notice tip %}}
In the above example, the `path` has not been changed, but you can change it to whatever you want (eg. `/demo/orders`). However, keep in mind that while this will re-route internal links, external or hardcoded links will keep targeting the old path.
{{% /notice %}}

{{% notice warning %}}
Keep the item `_legacy_controller` if your controller relies on it to configure a [AdminSecurity annotation]({{< relref "8/development/architecture/migration-guide/controller-routing#access-rules-convention" >}}) such as `@AdminSecurity("is_granted('read', request.get('_legacy_controller'))")`

Keep the items `_legacy_controller` and `_legacy_link` if you want to reroute internal links and legacy URLs like `index.php?controller=AdminOrders` as well.
{{% /notice %}}

Thanks to this, whenever an HTTP request is matched to the route `admin_orders_index`, then your controller `demoAction()` will be executed.

Thanks to option `_disable_module_prefix: true` (available from PS 1.7.7.0) the route path is `/sell/orders/orders`, just like the original route.

{{% notice tip %}}
Routing is computed and cached by Symfony. You will need to clear this cache for Symfony to acknowledge your updated routing.
You can do it by using `php bin/console cache:clear`.

If you have trouble writing the right routing configuration for your controller, you can use Symfony debugger to dump the routes with `php bin/console debug:router`.
{{% /notice %}}

## Override the controller

Since 1.7.7, PrestaShop Back Office controllers are registered as services, and like all public services, they can be [overridden][override-services] by modules.

For example, the controller responsible for the page "Improve > Design > CMS Pages" is registered with service ID `PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController`.

With the following configuration item, we can override this configuration to make it target our custom module:
```yaml
# modules/your-module/config/services.yml
  'PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController':
    class: MyModule\Controller\DemoController

```

Thanks to this, whenever Symfony forwards a request to the Core controller `PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController` it will be forwarded to `DemoController` instead.

{{% notice warning %}}
**This method is not recommended** unless you intend to rewrite the whole controller. In addition, if the implementation is updated in later versions of PrestaShop, your override will ignore these updates, which might create bugs.
{{% /notice %}}

{{% notice tip %}}
If you have trouble writing the right service configuration for your controller, you can use Symfony debugger to dump the routes with `php bin/console debug:container`. It can also be helpful to find the service ID of the controller.
{{% /notice %}}

## Decorate the controller

Instead of replacing the whole controller, we recommend _extending_ its behavior using [service decoration](https://symfony.com/doc/4.4/service_container/service_decoration.html). By implementing the [decorator pattern](https://refactoring.guru/design-patterns/decorator), you can keep most or all of the original behavior of the decorated controller, and only customize the parts you want.

{{% notice note %}}
While you could achieve a similar end with an override (by making your controller extend the original one), the decorator pattern provides a greater degree of freedom, while leaving all complexity of initialization and dependency management to the service container.
{{% /notice %}}


Back to the controller responsible for the page "Improve > Design > CMS Pages" which is registered with service ID `PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController`.

With the following configuration item, we can decorate it with a custom controller in our module:
```yaml
# modules/your-module/config/services.yml
  custom_controller:
    class: MyModule\Controller\DemoController
    decorates: PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController
    arguments: ['@custom_controller.inner']
```

or if you are using [autowiring](https://symfony.com/doc/4.4/service_container/autowiring.html):
```yaml
# modules/your-module/config/services.yml
  custom_controller:
    autowire: true
    class: MyModule\Controller\DemoController
    decorates: PrestaShopBundle\Controller\Admin\Improve\Design\CmsPageController
```

{{% notice warning %}}
You don't need to define custom routing for your decorated controller. Symfony will take care of it and use your controller instead of the original one,
just make sure you clear symfony cache after these changes (using command `bin/console cache:clear`). If (for some reason) you still need to modify the routing of your decorated controller, then you will need to add `public: true` to your decorated controller definition in module services.yml, or else you will get error complaining about your controller being private.
{{% /notice %}}

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

In this example we do nothing more than returning the exact output from the decorated controller.
However we could modify the input request or the output given by decorated controller before returning it. Example:

```php
<?php
    public function indexAction(CmsPageCategoryFilters $categoryFilters, CmsPageFilters $cmsFilters, Request $request)
    {
        $output = $this->decoratedController->indexAction($categoryFilters, $cmsFilters, $request);

        $myService = $this->getMyPaymentService();
        $output = $this->injectMyData($myService, $output);

        return $output;
    }
```


{{% notice tip %}}
If you have trouble writing the right service configuration for your decoration, you can use Symfony debugger to dump the routes with `php bin/console debug:container`. It can also be helpful to find the service ID of the controller.
{{% /notice %}}

[hooks]: {{< ref "/8/modules/concepts/hooks" >}}
[template-override]: {{< ref "/8/modules/concepts/templating/admin-views" >}}
[override-services]: {{< ref "/8/modules/concepts/services" >}}
