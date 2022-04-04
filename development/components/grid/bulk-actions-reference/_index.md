---
title: Bulk Actions reference
menuTitle: Bulk Actions reference
weight: 12
---

## Bulk Actions reference

You can define actions for every selected row of your grid. PrestaShop already comes with a list of common bulk actions that you can use in your own Grids.

### SubmitBulkAction

This action will submit the data of your rows into a specific route.

| Properties         | Expected value(s)                  |
|--------------------| -----------------------------------|
| **Type**           | `submit`                           |
| **Requirements**   | `submit_route`                     |
| **Defaults**       | `confirm_message` => null          |
|                    | `submit_method` => "POST"          |
| **Allowed Types**  | `submit_route` (string)            |
|                    | `confirm_message` (string or null) |
| **Allowed Values** | `submit_method` ("POST" or "GET")  |

### DeleteCategoriesBulkAction

This action will delete the selected Categories in Catalog > Categories page.

| Properties         | Expected value(s)                                   |
|--------------------| ----------------------------------------------------|
| **Type**           | `delete_categories`                                 |
| **Requirements**   | `categories_bulk_delete_route`                      |
| **Allowed Types**  | `submitcategories_bulk_delete_route_route` (string) |

### DeleteCustomersBulkAction

This bulk action will delete the selected Customers in Sell > Customers page.

| Properties         | Expected value(s)                      |
|--------------------| ---------------------------------------|
| **Type**           | `delete_customers`                     |
| **Requirements**   | `customers_bulk_delete_route`          |
| **Allowed Types**  | `customers_bulk_delete_route` (string) |

## Use case example

```php
<?php
// /modules/my-module/src/Grid/MyGridDefinitionFactory.php
namespace MyModule\Grid;

use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Action\Bulk\Type\SubmitBulkAction;
use PrestaShop\PrestaShop\Core\Grid\Action\Bulk\BulkActionCollection;

/**
 * How to define the Grid's bulk actions?
 * You can adapt this example or look at the existing ones
 * in PrestaShop's Core.
 */
class MyGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    /**
     * {@inheritdoc}
     */
    protected function getBulkActions()
    {
        return (new BulkActionCollection())
            ->add(
                (new SubmitBulkAction('enable_selection'))
                ->setName('Enable selection')
                ->setOptions([
                    'submit_route' => 'submit_stuff',
                ])
            )
        ;
    }
}
```

{{% notice note %}}
You need to create a custom Bulk Action? We got you [covered]({{< ref "/1.7/development/components/grid/tutorials/work-with-bulk-actions.md#how-to-create-custom-bulk-action" >}})!

{{% /notice %}}
