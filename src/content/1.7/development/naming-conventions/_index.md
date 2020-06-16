---
title: Naming conventions
weight: 12
---

# Conventions

As with [Coding standards][coding-standards] naming consistency is very important in PrestaShop, thus there are conventions that every PrestaShop contributor should follow.

## Naming conventions

{{% notice note %}}
At the moment naming conventions strictly applies for Back Office migration only.
{{% /notice %}}

### Controllers & actions

PrestaShop controllers follow these naming conventions:

- Prefix controller with resource name in singular form (e.g. `CustomerController`, `ProductController`);
- Prefix index action with `index`. For `Object` controllers (e.g. `CustomerController`) it's normally page with list of objects (e.g. Customers, Products) and for `Configuration` controllers (e.g. `PerformanceController`) it's page with configuration form (e.g. Caching configuration, CCC configuration).
- Action name should be clear and concise (e.g. `editAction()`, `savePrivateNoteAction()` are good examples, but `formAction()` or `processAction()` is not and thus should be avoided).

We have some standard action names:
- `indexAction` : display the listing
- `createAction` : show language creation form page and handle its submit
- `editAction` : show language edit form page and handle its submit
- `deleteAction` : delete an item

For a complete example see code below.

```php
<?php
// CustomerController.php

namespace PrestaShopBundle\Controller\Admin\Sell\Customer;

// Controller name is prefixed with Customer in singular form
class CustomerController
{
    // Index page which is opened when
    // user clicks "Improve > Sell > Customers" in side menu.
    // It shows list of customers and KPIs.
    public function indexAction()
    {
    }

    // Customer Edit page which is opened when
    // user clicks "Edit" action on selected customer.
    // It shows customer form with data that can be edited.
    public function editAction($customerId, Request $request)
    {
    }

    // Deletes given customer.
    // Does not show page, but returns flash message with redirect instead.
    public function deleteAction($customerId, Request $request)
    {
    }

    // Transforms guest customer (customer without password)
    // to customer with password.
    // Does not show page, but returns flash message with redirect instead.
    public function transformGuestToCustomerAction($customerId, Request $request)
    {
    }

    // Saves private note for customer, that can only be seen by admin in Back Office.
    // Does not show page, but returns flash message with redirect instead.
    public function savePrivateNoteAction($customerId, Request $request)
    {
    }

    // Toggle the status of given customer.
    // Does not show page, but returns flash message with redirect instead.
    public function toggleStatusAction($customerId)
    {
    }
}
```

### Templates

PrestaShop templates follow these naming conventions:

- Template name should match controller's action name without `action` suffix. For example, if you have `CustomerController:viewAction()` action, then your template name should be `view.html.twig`.

```php
<?php
// CustomerController.php

namespace PrestaShopBundle\Controller\Admin\Sell\Customer;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController as AbstractAdminController;

class CustomerController extends AbstractAdminController
{
    // Our action name is "view", thus our
    // template name is "view.html.twig".
    public function viewAction()
    {
        $this->render('@PrestaShop/Admin/Sell/Customer/view.html.twig');
    }
}
```

For a default page, you should be following our standard action names. Applying this rule, this means you should have matching template names:
- `index.html.twig`
- `create.html.twig`
- `edit.html.twig`
- `delete.html.twig`

### Routes and paths

PrestaShop routes follow `admin_{resources}_{action}` naming structure and rules for it are:

- `{resources}` (object) name should be in plural form (e.g. `customers`, `products`, `orders`).
- `{action}` name should match controller's action name.
- Route should define methods that it responds to (e.g. `GET`, `POST`).
- Suffix route's URL path with `{resources}` (e.g. `customers`, `products`, `orders`) name.
- When route is defined for single resource (e.g. Customer, Product) then URL path should follow `/{resources}/{id}/{action}` naming (e.g. `/customers/23/edit`).
- When resource identifier (ID) is used in URL path then it should be prefixed with object name (e.g. `/{customerId}/edit` instead of `/{id}/edit`).

If we were to create CRUD routes for Customer, this is how it would look like:

- Index route `admin_customers_index` with URL `/customers` and responds to `GET` method.
- Create route `admin_customers_create` with URL `/customers/new` and responds to `GET` and `POST` methods.
- Edit route `admin_customers_edit` with URL `/customers/{customerId}/edit ` and responds to `GET` and `POST` methods.
- Delete route `admin_customers_delete` with URL `/customers/{customerId}/delete` and responds to `POST` method.

Example of implementation for Customer routes:

```yaml
# src/PrestaShopBundle/Resources/config/routing/admin/sell/customer/_customer.yml

_catalog:
  resource: "customers.yml"
  # route urls defined in "customers.yml" file will be prefixed with "/customers"
  prefix: /customers/
```

```yaml
# src/PrestaShopBundle/Resources/config/routing/admin/sell/customer/customers.yml

admin_customers_index:
  path: /
  methods: [GET]
  defaults:
    _controller: PrestaShopBundle:Admin/Sell/Customer/Customer:index

admin_customers_edit:
  path: /{customerId}/edit
  methods: [GET, POST]
  defaults:
    _controller: PrestaShopBundle:Admin/Sell/Customer/Customer:edit
  requirements:
    customerId: \d+

admin_customers_transform_guest_to_customer:
  path: /{customerId}/transform-guest-to-customer
  methods: [POST]
  defaults:
    _controller: PrestaShopBundle:Admin/Sell/Customer/Customer:transformGuestToCustomer
  requirements:
    customerId: \d+
```

### Service ids

When registering service in YAML, its id should follow Fully-qualified class name. See example below.

```php
<?php
// src/Core/Payment/PaymentOptionFormDecorator.php

namespace PrestaShop\PrestaShop\Core\Payment;

class PaymentOptionFormDecorator
{
  // ...
}
```

```yaml
services:
  # service id follows fully-qualified class name
  prestashop.core.payment.payment_option_form_decorator:
    class: 'PrestaShop\PrestaShop\Core\Payment\PaymentOptionFormDecorator'
```

#### Named arguments

Using the "named argument" syntax when declaring or updating services is forbidden.


```yaml
services:
  # Good
  foo_bar:
      class: 'Foo\Bar'
      arguments:
        - 'baz'
  # Wrong
  wrong_foo_bar:
      class: 'Foo\Bar'
      arguments:
        - $baz: 'baz'
```

### Grid

PrestaShop comes with a lot of Grids (Products, Customers, Orders & etc) and keeping consistency between them is very important, thats why it follows these naming conventions:

- Grid id should be in lowercase and written in `snake_case`

[coding-standards]: {{< ref "/1.7/development/coding-standards/_index.md" >}}
