---
title: ActionColumn reference
menuTitle: ActionColumn
weight: 60
---

# ActionColumn Type

This type of column allows to add actions to your Grid rows.

## Available options

### field

**actions:** `array|null` **default:** `null`

Record field name which will be used as bulk action checkbox value.

## Example usage

```php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ActionColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$productColumn = new ActionColumn('actions');
$productColumn->setName('Actions');
$productColumn->setOptions([
     'actions' => [
        ->add((new LinkRowAction('delete'))
            ->setIcon('delete')
            ->setOptions([
                'route' => 'admin_custom_route',
                'route_param_name' => 'mailId',
                'route_param_field' => 'id_mail',
                'confirm_message' => 'Delete selected item?',
            ])
        )
     ],
]);

$columns = new ColumnCollection();
$columns->add($productColumn);
```
