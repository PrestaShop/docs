---
title: Column Types reference
menuTitle: Column Types reference
weight: 10
---

## Column Types reference

Most important Grid definition part is defining columns. PrestaShop already comes with a list of predefined columns that you can use in your own Grids.

### Supported Types

#### Basic columns

* [DataColumn][data-column-reference]

#### Common columns

* [ActionColumn][action-column-reference]
* [BulkActionColumn][bulk-action-column-reference]
* [DateTimeColumn][datetime-column-reference]

#### Employee columns

* [EmployeeNameWithAvatarColumn][employee-name-wit-avatar-column-reference]

#### Status columns

* [SeverityLevelColumn][severity-column-reference]

[data-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/data.md" >}}
[action-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/action.md" >}}
[bulk-action-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/bulk-action.md" >}}
[datetime-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/datetime.md" >}}
[employee-name-wit-avatar-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/employee-name-with-avatar.md" >}}
[severity-column-reference]: {{< ref "/1.7/development/components/grid/columns-reference/severity-level.md" >}}

## Use case exemple

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

/**
 * How to define the Grid columns?
 * You can adapt this exemple or look at the existing ones
 * in PrestaShop Core.
 */
class MyGridDefinitionFactory extends AbstractGridDefinition
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
You need to create a custom Column Type? We got you [covered](../tutorials/create-custom-bulk-action)!
{{% /notice %}}