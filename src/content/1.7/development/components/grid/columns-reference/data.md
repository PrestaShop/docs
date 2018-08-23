---
title: DataColumn reference
menuTitle: DataColumn
weight: 60
---

# DataColumn Type

The most basic column is DataColumn. It is used to display raw field data in Grid.

## Available options

### field

**type:** `string` **required**

Record field name which column displays.

## Example usage

```php
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