---
title: ToggleColumn reference
menuTitle: ToggleColumn
weight: 10
---

# ToggleColumn Type
{{< minver v="1.7.5" title="true" >}}

This ToggleColumn is used to display booleans, it will display an icon instead of the value. If the user clicks on it, this triggers a toggle of the boolean value.

## Available options

| Properties     | Type   | Expected value                                                               |
| -------------- | ------ | ---------------------------------------------------------------------------- |
| **field**      | string | **required** The record field name that the column displays.                 |
| **primary_field**      | string | **required** The record field name that the column displays.         |
| **route** | string | **required** The route used to generated link url.                                |
| **route_param_name** | string | **required** The parameter name used by the route to generate the url. |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ToggleColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$toggleColumn = new ToggleColumn('active');
$toggleColumn->setName('Enabled');
$toggleColumn->setOptions([
     'field' => 'active',
     'primary_field' => 'id_customer',
     'route' => 'admin_customers_toggle_status',
     'route_param_name' => 'customerId',
]);

$columns = new ColumnCollection();
$columns->add($toggleColumn);
```
