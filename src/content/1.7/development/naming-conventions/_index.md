---
title: Naming conventions
weight: 10
---

# Naming conventions

As with [Coding standards][coding-standards] naming consistency is very important in PrestaShop.

{{% notice note %}}
At the moment naming convetions strictly applies for Back Office migration only. 
{{% /notice %}}

## Controllers & actions naming

PrestaShop controllers follow these naming conventions:

- Suffix controller with resource name in singular form (e.g. `CustomerController`, `ProductController`);
- Suffix index action with `index`. For `Object` controllers (e.g. `CustomerController`) it's normally page with list of objects (e.g. Customers, Products) and for `Configuration` controllers (e.g. `PerformanceController`) it's page with configuration form (e.g. Caching configuration, CCC configuration).
- Action name should be clear and concise (e.g. `editAction()`, `savePrivateNoteAction()` are good examples, but `formAction()` or `processAction()` is not and thus should be avoided).

For a complete example see code below.

```php
// CustomerController.php

namespace PrestaShopBundle\Controller\Admin\Sell\Customer;

// Controller name is suffixed with Customer in singular form
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
}
```

## Templates naming

PrestaShop templates follow these naming convetions:

- Template name should match controller's action name without `action` prefix. For example, if you have `CustomerController:viewAction()` action, then your template name should be `view.html.twig`.

```php
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

## Routes naming

PrestaShop routes follow `admin_{resources}_{action}` naming structure and rules for it are:

- `{resources}` (object) name should be in prular form (e.g. `customers`, `products`, `orders`);
- `{action}` name should match controller's action name;
- Route should define methods that it responds to (e.g. `GET`, `POST`);
- Suffix route's URL path with `{resources}` (e.g. `customers`, `products`, `orders`) name;
- When route is defined for single resource (e.g. Customer, Product) then URL path should follow `/{resources}/{id}/{action}` naming (e.g. `/customers/23/edit`).
- When resource identifier (ID) is used in URL path then it should be prefixed with object name (e.g. `/{customerId}/edit` instead of `/{id}/edit`).

If we were to create CRUD routes for Customer, this is how it would look like:

- Index route `admin_customers_index` with URL `/customers` and responds to `GET` method
- Create route `admin_customers_create` with URL `/customers/new` and responds to `GET` and `POST` methods
- Edit route `admin_customers_edit` with URL `/customers/{customerId}/edit ` and responds to `GET` and `POST` methods
- Delete route `admin_customers_delete` with URL `/customers/{customerId}/delete` and responds to `POST` method

Example implemnetation for Customer routes:

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

[coding-standards]: {{< ref "/1.7/development/coding-standards/_index.md" >}}
