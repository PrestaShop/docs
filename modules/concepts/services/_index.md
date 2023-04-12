---
title: Services
weight: 8
---

# Services
{{< minver v="1.7.3" title="true" >}}

## Symfony Services

You have the ability to modify the Symfony container configuration from a module. This means that

- You have the possibility to define your own Symfony services from your modules.
- You have the possibility to modify existing Symfony services declaration from your modules, which is somehow an Override mechanism

### Create and declare a new Symfony service

First we strongly advise you to use
[**namespaces**](https://www.php.net/manual/en/language.namespaces.php) & autoloading in your module, which can be done thanks to composer.
[A dedicated chapter]({{< ref "8/modules/concepts/composer" >}}) is available to learn more about Composer and to set it up.

#### Define your service

At first you will need to create a class for your service of course:

```php
<?php
// modules/yourmodule/src/YourService.php
namespace YourCompany\YourModule;

use Symfony\Component\Translation\TranslatorInterface;

class YourService {
    /** @var TranslatorInterface */
    private $translator;

    /** @var string */
    private $customMessage;

    /**
     * @param string $customMessage
     */
    public function __construct(
        TranslatorInterface $translator,
        $customMessage
    ) {
        $this->translator = $translator;
        $this->customMessage = $customMessage;
    }

    /**
     * @return string
     */
    public function getTranslatedCustomMessage() {
        return $this->translator->trans($this->customMessage, [], 'Modules.YourModule');
    }
}
```

Now that your namespace is setup, you can define your services in the `config/services.yml` file of your module.

```yml
# yourmodule/config/services.yml
services:
  _defaults:
    public: true

  your_company.your_module.your_service:
    class: YourCompany\YourModule\YourService
    arguments:
      - "@translator"
      - "My custom message"
```

{{% notice tip %}} It is possible to load PHP / XML files for modules services{{% /notice %}}

```yml
# yourmodule/config/services.yml
imports:
    - { resource: services.php }
```

```php
<?php
// yourmodule/config/services.php
namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return function(ContainerConfigurator $configurator) {

};
```

This will then allow you to get your service from the Symfony container, like in your modern controllers:

```php
<?php
// modules/yourmodule/src/Controller/DemoController.php
namespace YourCompany\YourModule\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class DemoController extends FrameworkBundleAdminController
{
    public function demoAction()
    {
        $yourService = $this->get('your_company.your_module.your_service');

        return $this->render('@Modules/yourmodule/templates/admin/demo.html.twig', [
            'customMessage' => $yourService->getTranslatedCustomMessage(),
        ]);
    }
}
```

{{% notice tip %}}
If you need more details about dependency injection and how services work in the Symfony environment we recommend you to read
their documentation about the [Service Container](https://symfony.com/doc/4.4/service_container.html).
{{% /notice %}}

### Override an existing Symfony service

The container definition can be modified by a module, which enables you to override an existing Symfony service being used in PrestaShop.

This is a mechanism similar to PrestaShop standard overrides, but the main benefit is that the php code stays unmodified. This prevents issues linked to code definition or autoloading failures.

As you can read it from the [Symfony documentation](https://symfony.com/doc/current/service_container/service_decoration.html), there are 2 ways to modify an existing service:

#### Override the service

When you choose to override a service, this means that you _replace the service by another one_. The previous service is not usable anymore. Every other part of the code where this service is used will use the new version.

To do it: you declare your new service using the old service name. So if you want to override the service `prestashop.core.b2b.b2b_feature` with your own implementation, you write in `config/services.yml` :

```yml
  prestashop.core.b2b.b2b_feature:
    class: 'YourCompany\YourModule\YourService'
```

That's done. The service registered under the name `prestashop.core.b2b.b2b_feature` is now your service. The previous `prestashop.core.b2b.b2b_feature` is gone.

#### Decorate the service

When you choose to decorate a service, this means that you _make everybody use your service but you keep the old service available_. The previous service has been given a new name and can still be used. Every other part of the code where this service was used will use the new version.

To do it: you declare your new service using the 'decorates' keyword. So if you want to decorates the service `prestashop.core.b2b.b2b_feature` with my own implementation, you write in `config/services.yml` :

```yml
 mymodule.my_own_b2b_feature_service:
    class: 'YourCompany\YourModule\YourService'
    decorates: 'prestashop.core.b2b.b2b_feature'
```

That's done. The service registered under the name `mymodule.my_own_b2b_feature_service` is now your service. The previous `prestashop.core.b2b.b2b_feature` implementation is still available under the name `mymodule.my_own_b2b_feature_service.inner`.

This means that in your container you can access 3 services now:

- `mymodule.my_own_b2b_feature_service` your service
- `prestashop.core.b2b.b2b_feature` is now an alias for `mymodule.my_own_b2b_feature_service` (see [service aliases](https://symfony.com/doc/current/service_container/alias_private.html)) so the other services which rely on it now use your implementation
- `mymodule.my_own_b2b_feature_service.inner` is the previous implementation, still available

The decoration strategy can be very useful if:

- you want some areas of your code to use the new service, some others to use the old service
- you want to use the old service in the implementation of the new service

Indeed sometimes what you want is to modify a small part of the behavior of a class. So why replace it entirely ? You can reuse the existing behavior and modify only the needed part:

```php
<?php
// modules/yourmodule/src/YourService.php
namespace YourCompany\YourModule;

class YourService {

    private $decoratedService;

    /**
     * @param DecoratedService $decoratedService
     */
    public function __construct($decoratedService)
    {
        $this->decoratedService = $decoratedService;
    }

    /**
     * We want to modify the behavior of the function getTranslatedCustomMessage
     * without replacing the whole DecoratedService implementation
     *
     * @return string
     */
    public function getTranslatedCustomMessage() {

        $unmodifiedOutput = $this->decoratedService->getTranslatedCustomMessage();

        $modifiedOutput = $this->modifyTheOutput($unmodifiedOutput);

        return $modifiedOutput;
    }
}
```

This is only possible with service decoration, not service override, because the previous service is still available.

#### Finding the right service

The Symfony command `php ./bin/console debug:container` will provide you with a list of all the registered services.

#### Maintaining compatibility

What happens, however, if the service you have overriden or decorated is used somewhere else ? You have to make sure your modifications are still compatible with this place in order not to break any existing behavior.

Even worse: what if another part of the code especially requires this class, like this:
```php
<?php
    /**
     * @param ASpecificClass $service
     */
    public function __construct(ASpecificClass $service)
    {
        // ...
    }
```

Here, this constructor will crash if you provide something else than an instance of `ASpecificClass` to it.

In order to avoid this crash, 2 options are available:

PrestaShop classes rely more and more on [interfaces](https://www.php.net/manual/en/language.oop5.interfaces.php). So if this code has been built with the idea of customization/extension in mind, instead of `public function __construct(ASpecificClass $service)` you should have:
```php
<?php
    /**
     * @param MyInterface $service
     */
    public function __construct(MyInterface $service)
    {
        // ...
    }
```

Your new service, which overrides or decorates the previous service, only needs to `implement` the interface to be compatible with it.

If however no interface was used here, you probably need to `extend` the previous class, `ASpecificClass`, instead.

As you can see, interfaces lay the ground for easy extension and customization, that is why we use them more and more in the Core codebase and we recommend you use them as well !

#### Advanced services parameters (_instanceof or interface binding, manual tags) {{< minver v=8.1 >}}

Since {{< minver v=8.1 >}}, [modules autoloaders and service configurations loading are now registered before compiler passes](https://github.com/PrestaShop/PrestaShop/pull/30588). That means that you can now use native Symfony service configuration features in your modules. 

Those features are:

- [applying configuration based on the extended classes or implemented interfaces](https://symfony.com/blog/new-in-symfony-3-3-simpler-service-configuration#interface-based-service-configuration)
- [autoconfiguration](https://symfony.com/blog/new-in-symfony-3-3-simpler-service-configuration#interface-based-service-configuration)
- [an option to skip the class attribute](https://symfony.com/blog/new-in-symfony-3-3-optional-class-for-named-services)
- [automatically registering classes found in the specified directories as services](https://symfony.com/blog/new-in-symfony-3-3-psr-4-based-service-discovery)

As an example, let's consider a module with the following structure: 

```
config/
    services.yml
src/
    Collection/
        Collection.php
        Element.php
        ElementInterface.php
```

And this content: 

File: `src/Collection/Collection.php` 

```php
<?php

namespace TestModule\InstanceofConditionals\Collection;

class Collection
{
    private $elements = [];

    public function __construct(iterable $elements)
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }
    }
```

File: `src/Collection/Element.php`

```php
<?php

namespace TestModule\InstanceofConditionals\Collection;

interface ElementInterface
{
}
```

File: `src/Collection/ElementInterface.php`

```php
<?php

namespace TestModule\InstanceofConditionals\Collection;

class Element implements ElementInterface
{
}
```

##### Example: bind a parameter by tag name and _instanceof automatic tagging (via interface)

In your module's `config/common.yml`, set the following configuration:

```yaml
services:
  _defaults:
    autowire: true
    bind:
      $elements: !tagged test_module.instance_of.instance_of_tagged

  _instanceof:
    TestModule\InstanceofConditionals\Collection\ElementInterface:
      tags: [ test_module.instance_of.instance_of_tagged ]
```

This example will tag all classes _instances of_ `TestModule\InstanceofConditionals\Collection\ElementInterface` (`TestModule\InstanceofConditionals\Collection\Element` in our example) with the tag `test_module.instance_of.instance_of_tagged`. 

Then, it will bind all services with a `$element` variable in its constructor with a `test_module.instance_of.instance_of_tagged` service.

##### Example: bind a parameter by tag name and tag a service manually

In your module's `config/common.yml`, set the following configuration:

```yaml
services:
  _defaults:
    autowire: true
    bind:
      $elements: !tagged test_module.instance_of.manually_tagged

  TestModule\InstanceofConditionals\Collection\Element:
    class: TestModule\InstanceofConditionals\Collection\Element
    tags: [ test_module.instance_of.manually_tagged ]
```

This example will tag the class `TestModule\InstanceofConditionals\Collection\Element` with the tag `test_module.instance_of.manually_tagged`.

Then, it will bind all services with a `$element` variable in its constructor with a `test_module.instance_of.manually_tagged` service.

If we wanted to bind only parameter `$element` of class `TestModule\InstanceofConditionals\Collection\Collection` with a `test_module.instance_of.manually_tagged` tag, we would had configured it this way: 

```yaml
services:
  test_module.instance_of.manually_tagged_collection:
    class: TestModule\InstanceofConditionals\Collection\Collection
    public: true
    bind:
      $elements: !tagged test_module.instance_of.manually_tagged
  
  TestModule\InstanceofConditionals\Collection\Element:
    class: TestModule\InstanceofConditionals\Collection\Element
    tags: [ test_module.instance_of.manually_tagged ]
```

Explore more configuration features in [the official Symfony documentation](https://symfony.com/doc/4.4/service_container.html#creating-configuring-services-in-the-container).

## Services in Legacy environment
{{< minver v="1.7.6" title="true" >}}

Being able to declare services for Symfony environment is a nice feature when you use modern controllers, however when
you are on front office or in a legacy page in the back office (meaning a page that has not been migrated yet with Symfony)
you can't access the Symfony container or your services.

Since the version **1.7.6** you can now define your services and access them in the legacy environment. We manage a light
container for this environment (`PrestaShop\PrestaShop\Adapter\ContainerBuilder`) which is accessible from legacy containers.

To define your services you need to follow the same principle as Symfony services, but this time you need to place your definition
files in sub folders:

- `config/admin/services.yml` will define the services accessible in the back office (in legacy environment AND Symfony environment)
- `config/front/services.yml` will define the services accessible in the front office

### Accessing your services

You can then access your services from any legacy controllers (in which the container is automatically injected):

```php
<?php
// modules/yourmodule/controllers/front/Demo.php
class YourModuleDemoModuleFrontController extends ModuleFrontController {
    public function display()
    {
        ...
        $yourService = $this->get('your_company.your_module.front.your_service');
        ...
    }
}
```

```php
<?php
// modules/yourmodule/controllers/admin/demo.php
// Legacy controllers have no namespace
class YourModuleDemoModuleAdminController extends ModuleAdminController {
    public function display()
    {
        ...
        $yourService = $this->get('your_company.your_module.admin.your_service');
        ...
    }
}
```

But you can also access them from your module, to display its content or in hooks:

```php
<?php
// modules/yourmodule/yourmodule.php
class yourmodule {
    public function getContent()
    {
        ...
        // The controller here is the ADMIN one so only admin services are accessible
        $yourService = $this->get('your_company.your_module.admin.your_service');
        ...
    }

    public function hookDisplayFooterProduct($params)
    {
        ...
        // The controller here is the FRONT one so only front services are accessible
        $yourService = $this->get('your_company.your_module.front.your_service');
        ...
    }
}
```

### Environments

Keep in mind that the legacy container is a light version of the full Symfony container so you won't have access to all the
Symfony components. But you will be able to use the **Doctrine** service as well as a few core services from PrestaShop.

For more details about available services you can check in `<PS_ROOT_DIR>/config/services/` folder which services are available
in admin or front. Be careful and always keep in mind in which context/environment you are calling your service.

Here is a quick summary so that you know where you should define your services:

| Definition file           | Symfony Container         | Front Legacy Container           | Admin Legacy Container | Available services                                                         |
| ------------------------- |:------------------------- |:-------------------------------- |:---------------------- |:-------------------------------------------------------------------------- |
| config/services.yml       | Yes                       | No                               | No                     | All symfony components and PrestaShopBundle services                       |
| config/admin/services.yml | Yes                       | No                               | Yes                    | Doctrine, services defined in `<PS_ROOT_DIR>/config/services/admin` folder |
| config/front/services.yml | Yes                       | Yes                              | No                     | Doctrine, services defined in `<PS_ROOT_DIR>/config/services/front` folder |

### Define a service on both front and admin

Sometimes services are only useful in a particular context (back-office or front-office), but sometime you also need them on both
(a Doctrine repository is a good example). You could easily define the same services in both environment but it's very modular and can
create errors in case of modifications.

An easy trick is to create a common definition file which will then be included by each environment:

```yaml
# yourmodule/config/common.yml
services:
  _defaults:
    public: true

  your_company.your_module.common.open_service:
    class: YourCompany\YourModule\YourService
    arguments:
      - '@your_company.your_module.common.open_dependency'

  your_company.your_module.common.open_dependency:
    class: YourCompany\YourModule\YourServiceDependency
```

Then you can include this file in the environment you wish (front, admin, Symfony);

```yaml
# yourmodule/config/services.yml
imports:
    - { resource: ./common.yml }
```

```yaml
# yourmodule/config/admin/services.yml
imports:
    - { resource: ../common.yml }
```

```yaml
# yourmodule/config/front/services.yml
imports:
    - { resource: ../common.yml }
```
