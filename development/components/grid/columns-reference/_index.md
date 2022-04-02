---
title: Column Types reference
menuTitle: Column Types reference
weight: 10
---

# Column Types reference

The most important part of a Grid definition is defining columns. PrestaShop already comes with a list of predefined column types that you can use in your own Grids.

## Supported Types

### Basic columns

* [ColorColumn][color-column-reference]
* [DataColumn][data-column-reference]
* [DateTimeColumn][datetime-column-reference]
* [ImageColumn][image-column-reference]
* [ToggleColumn][toggle-column-reference]
* [BadgeColumn][badge-column-reference]
* [LinkColumn][link-column-reference]

### Action columns

* [ActionColumn][action-column-reference]
* [BulkActionColumn][bulk-action-column-reference]
* [PositionColumn][position-column-reference]

### Employee columns

* [EmployeeNameWithAvatarColumn][employee-name-wit-avatar-column-reference]

### Status columns

* [SeverityLevelColumn][severity-column-reference]

[color-column-reference]: {{< ref "/8/development/components/grid/columns-reference/color" >}}
[data-column-reference]: {{< ref "/8/development/components/grid/columns-reference/data" >}}
[datetime-column-reference]: {{< ref "/8/development/components/grid/columns-reference/datetime" >}}
[image-column-reference]: {{< ref "/8/development/components/grid/columns-reference/image" >}}
[toggle-column-reference]: {{< ref "/8/development/components/grid/columns-reference/toggle" >}}
[badge-column-reference]: {{< ref "/8/development/components/grid/columns-reference/badge" >}}
[link-column-reference]: {{< ref "/8/development/components/grid/columns-reference/link" >}}

[action-column-reference]: {{< ref "/8/development/components/grid/columns-reference/action" >}}
[bulk-action-column-reference]: {{< ref "/8/development/components/grid/columns-reference/bulk-action" >}}
[position-column-reference]: {{< ref "/8/development/components/grid/columns-reference/position" >}}

[employee-name-wit-avatar-column-reference]: {{< ref "/8/development/components/grid/columns-reference/employee-name-with-avatar" >}}
[severity-column-reference]: {{< ref "/8/development/components/grid/columns-reference/severity-level" >}}

## Use case example

```php
<?php
// /modules/my-module/src/Grid/MyGridDefinitionFactory.php
namespace MyModule\Grid;

use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\BulkActionColumn;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\RowActionCollection;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ActionColumn;

/**
 * How to define the Grid's columns?
 * You can adapt this example or look at the existing ones
 * in PrestaShop's Core.
 */
class MyGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    /**
     * {@inheritdoc}
     */
    protected function getColumns()
    {
        return (new ColumnCollection())
            ->add(
                (new BulkActionColumn('delete_stuff'))
                ->setOptions([
                    'bulk_field' => 'id_stuff',
                ])
            )
            ->add(
                (new DataColumn('id_stuff'))
                ->setName('ID')
                ->setOptions([
                    'field' => 'id_stuff',
                ])
            )
            ->add(
                (new ActionColumn('actions'))
                ->setName('Actions')
                ->setOptions([
                    'actions' => (new RowActionCollection())
                    ->add(
                        (new LinkRowAction('delete'))
                        ->setIcon('delete')
                        ->setOptions([
                            'route' => 'delete_stuff',
                            'route_param_name' => 'stuffId',
                            'route_param_field' => 'id_stuff',
                            'confirm_message' => 'Delete selected item?',
                        ])
                    ),
                ])
            )
        ;
    }
}
```

{{% notice note %}}
You need to create a custom Column Type? We got you [covered](../tutorials/create-custom-column-type)!
{{% /notice %}}
