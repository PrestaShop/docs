---
title: Actions reference
menuTitle: Actions reference
weight: 11
---

## Grid Actions reference

Grid Actions are tasks available for your grid for common actions.

### SimpleGridAction

This action allows to add a label to the Grid Actions block. Then you can manage the behavior when
clicking on this label using Javascript for example.

{{% notice note %}}
"Refresh list", "Show SQL query" and "Export to SQL Manager" actions are created using `SimpleGridAction` actions.
{{% /notice %}}

| Properties         | Expected value |
|--------------------| ---------------|
| **Id**             | A string       |
| **Type**           | `simple`       |
| **Name**           | A string       |
| **Icon**           | A string       |

### LinkGridAction

This action will create a labelized link into the Grid actions block.

| Properties         | Expected value(s)      |
|--------------------| -----------------------|
| **Id**             | A string               |
| **Type**           | `link`                 |
| **Name**           | A string               |
| **Icon**           | A string               |
| **Options**        | `route`                |
|                    | `route_params`         |
| **Requirements**   | `route`                |
| **Defaults**       | `route_params` => []   |
| **Allowed Types**  | `route` (string)       |
|                    | `route_params` (array) |

### SubmitGridAction

This action will create a submittable label into the Grid actions block.

| Properties         | Expected value(s)                    |
|--------------------| -------------------------------------|
| **Id**             | A string                             |
| **Type**           | `submit`                             |
| **Name**           | A string                             |
| **Icon**           | A string                             |
| **Options**        | `submit_route`                       |
|                    | `submit_method`                      |
|                    | `confirm_message`                    |
| **Requirements**   | `submit_route`                       |
| **Defaults**       | `submit_method` => 'POST'            |
|                    | `confirm_message` => null            |
| **Allowed Types**  | `submit_route` (string)              |
|                    | `confirm_message` (string or null)   |
| **Allowed Values** | `submit_method` => ('POST' or 'GET') |

## Row Actions reference

Grid Row Actions are tasks available in a Grid row **when defining a column** that supports tasks.

### LinkRowAction

Very similar to the *LinkGridAction*, but capable to manage User accesses on the content.

| Properties         | Expected value(s)               |
|--------------------| --------------------------------|
| **Id**             | A string                        |
| **Type**           | `link`                          |
| **Name**           | A string                        |
| **Icon**           | A string                        |
| **Options**        | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
|                    | `confirm_message`               |
|                    | `accessibility_checker`         |
|                    | `clickable_row`                 |
| **Requirements**   | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
| **Defaults**       | `confirm_message` => ''         |
|                    | `accessibility_checker` => null |
|                    | `clickable_row` => false        |
| **Allowed Types**  | `route` (string)                |
|                    | `route_param_name` (string)     |
|                    | `route_param_field` (string)    |
|                    | `confirm_message` (string)      |
|                    | `accessibility_checker` (callable or null  or instance of AccessibilityCheckerInterface) |
|                    | `clickable_row` (boolean)       |

### SubmitRowAction

Very similar to the *SubmitGridAction*, but capable to manage User accesses on the content.

| Properties         | Expected value(s)               |
|--------------------| --------------------------------|
| **Id**             | A string                        |
| **Type**           | `submit`                        |
| **Name**           | A string                        |
| **Icon**           | A string                        |
| **Options**        | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
|                    | `confirm_message`               |
|                    | `accessibility_checker`         |
|                    | `method`                        |
| **Requirements**   | `route`                         |
|                    | `route_param_name`              |
|                    | `route_param_field`             |
| **Defaults**       | `confirm_message` => ''         |
|                    | `accessibility_checker` => null |
|                    | `method` => 'POST'              |
| **Allowed Types**  | `route` (string)                |
|                    | `route_param_name` (string)     |
|                    | `route_param_field` (string)    |
|                    | `method` (string)               |
|                    | `confirm_message` (string)      |
|                    | `accessibility_checker` (callable or null  or instance of AccessibilityCheckerInterface) |

### DeleteCustomerRowAction

This row action will delete the Customer in Sell > Customers page.

| Properties         | Expected value(s)                   |
|--------------------| ------------------------------------|
| **Id**             | A string                            |
| **Type**           | `delete_customer`                   |
| **Name**           | A string                            |
| **Icon**           | A string                            |
| **Options**        | `customer_id_field`                 |
|                    | `customer_delete_route`             |
| **Requirements**   | `customer_id_field`                 |
|                    | `customer_delete_route`             |
| **Defaults**       | `customer_id_field` (string)        |
|                    | `customer_delete_route` => (string) |

### DeleteCategoryRowAction

This row action will delete the Category in Catalog > Categories page.

| Properties         | Expected value(s)                   |
|--------------------| ------------------------------------|
| **Id**             | A string                            |
| **Type**           | `delete_category`                   |
| **Name**           | A string                            |
| **Icon**           | A string                            |
| **Options**        | `category_id_field`                 |
|                    | `category_delete_route`             |
| **Requirements**   | `category_id_field`                 |
|                    | `category_delete_route`             |
| **Defaults**       | `category_id_field` (string)        |
|                    | `category_delete_route` => (string) |

## Use case example

```php
<?php
// /modules/my-module/src/Grid/MyGridDefinitionFactory.php
namespace MyModule\Grid;

use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Action\GridActionCollection;
use PrestaShop\PrestaShop\Core\Grid\Action\Type\SubmitGridAction;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ActionColumn;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\RowActionCollection;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\SubmitRowAction;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

/**
 * How to define the Grid's actions?
 * You can adapt this example or look at the existing ones
 * in PrestaShop's Core.
 */
class MyGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    /**
     * {@inheritdoc}
     */
    protected function getGridActions()
    {
        return (new GridActionCollection())
            ->add(
                (new SubmitGridAction('delete_all_email_logs'))
                ->setName('Erase all')
                ->setIcon('delete')
                ->setOptions([
                    'submit_route' => 'admin_logs_delete_all',
                    'confirm_message' => 'Are you sure?',
                ])
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function getColumns()
    {
        return (new ColumnCollection())
            ->add(
                (new ActionColumn('actions'))
                ->setName($this->trans('Actions', [], 'Admin.Global'))
                ->setOptions([
                    'actions' => (new RowActionCollection())
                    ->add(
                        (new LinkRowAction('edit'))
                        ->setName('Edit')
                        ->setIcon('edit')
                        ->setOptions([
                            'route' => 'edit_stuff',
                            'route_param_name' => 'stuffId',
                            'route_param_field' => 'stuffId',
                            // A click on the row will have the same effect as this action
                            'clickable_row' => true,
                        ])
                    )
                    ->add(
                        (new SubmitRowAction('delete'))
                        ->setName('Delete')
                        ->setIcon('delete')
                        ->setOptions([
                            'confirm_message' => 'Delete selected item?',
                            'route' => 'delete_stuff',
                            'route_param_name' => 'stuffId',
                            'route_param_field' => 'stuffId',
                        ])
                    )
                ])
            )
        ;
    }
}
```

{{% notice note %}}
You need to create a custom Bulk Action? We got you [covered]({{< ref "../tutorials/create-custom-column-type" >}})!
{{% /notice %}}
