---
title: Naming conventions
weight: 12
---

# Naming Conventions

As with [Coding standards][coding-standards], naming consistency is very important in PrestaShop, thus there are conventions that every PrestaShop contributor should follow.

{{% notice note %}}
At the moment naming conventions are enforced for new code only.
{{% /notice %}}

## Controllers & actions

PrestaShop controllers follow these naming conventions:

- Controller names start with an upper case letter and end in _"Controller"_ (e.g. `SomethingController`).
- Prefix controller names with the name of the related resource in singular form (e.g. `CustomerController`, `ProductController`).

Actions follow these conventions:

- Action names start with a lowercase letter and end in _"Action"_ (e.g. `deleteAction`).
- Action names should be clear and concise: `editAction()`, `savePrivateNoteAction()` are good examples, but `formAction()` or `processAction()` are not clear enough.
- The main controller action should be named `indexAction`.
- Some actions names are standardized:
    - `indexAction`: displays the listing (in Object-type controllers like `CustomerController`) or a form in configuration controllers.
    - `createAction`: shows the object's creation form page and handles the form submit
    - `editAction`: shows the object's edit form page and handles its submit
    - `deleteAction`: deletes an item

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

## Templates

PrestaShop templates follow these naming conventions:

- A template's name should match its controller's action name without the "action" suffix. For example, if you have `CustomerController:viewAction()` action, then your template name should be `view.html.twig`.

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

For a typical CRUD page, you should have these template names:
- `index.html.twig`
- `create.html.twig`
- `edit.html.twig`
- `delete.html.twig`

## Routes and paths

PrestaShop routes follow `admin_{resource}_{action}` naming structure.

- `{resource}` is the object's name in plural form (e.g. `customers`, `products`, `orders`).
- `{action}` name should match the controller's action name (without the "Action" suffix).
- The route should define all HTTP methods that it responds to (e.g. `GET`, `POST`).
- Use `{resource}` as prefix (root) of the controller's routes  (e.g. `/customers/foo`, `/customers/bar`).
- When the route points to an action to be performed on an individual resource then URL path should follow `/{resource}/{resourceId}/{action}` naming (e.g. `/customers/23/edit`).
- When resource identifier (ID) is used in URL path then its placeholder should be prefixed with the object's name (e.g. `/customers/{customerId}/` instead of `/customers/{id}/`).

If we were to create CRUD routes for Customer, this is how it would look like:

- Index route is `admin_customers_index`, with URL `/customers` and responds to `GET` method.
- Create route is `admin_customers_create`, with URL `/customers/new` and responds to `GET` and `POST` methods.
- Edit route is `admin_customers_edit`, with URL `/customers/{customerId}/edit ` and responds to `GET` and `POST` methods.
- Delete route is `admin_customers_delete`, with URL `/customers/{customerId}/delete` and responds to `POST` method.

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

## Service ids

Service ids should follow the fully-qualified class name of the registered class. See example below.

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

### Named arguments

**Do NOT** use "named argument" syntax in service declaration:


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

## Grid

PrestaShop comes with a lot of Grids (Products, Customers, Orders & etc) and keeping consistency between them is very important, thats why it follows these naming conventions:

- Grid ids should be in lowercase and written in `snake_case`

## Modules

- Module names should contain only lower case and numbers. 
- [Native modules][native-modules]' names must be prefixed with "ps_" (e.g. `ps_linklist`).  

[native-modules]: {{< relref "../native-modules/" >}}
[coding-standards]: {{< ref "/8/development/coding-standards/" >}}

