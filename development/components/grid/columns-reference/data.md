---
title: DataColumn reference
menuTitle: DataColumn
weight: 10
---

# DataColumn Type

The most basic column is DataColumn. It is used to display raw field data in Grid.

## Available options

| Properties | Type   | Expected value                                               |
| ---------- | ------ | ------------------------------------------------------------ |
| **field**  | string | **required** The record field name that the column displays. |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$dataColumn = new DataColumn('id_product');
$dataColumn->setName('ID');
$dataColumn->setOptions([
     'field' => 'id_product',
]);

$columns = new ColumnCollection();
$columns->add($dataColumn);
```
