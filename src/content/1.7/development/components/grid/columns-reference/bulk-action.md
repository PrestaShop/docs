---
title: BulkActionColumn reference
menuTitle: BulkActionColumn
weight: 60
---

# BulkActionColumn Type

This type of column allows to add bulk action checkboxes to your Grid.

## Available options

### field

**bulk_field:** `string` **required**

Record field name which will be used as bulk action checkbox value.

## Example usage

```php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\BulkActionColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$productColumn = new BulkActionColumn('bulk_action');
$productColumn->setName(''); // it is common set empty name for bulk action columns
$productColumn->setOptions([
     'bulk_field' => 'id_product',
]);

$columns = new ColumnCollection();
$columns->add($productColumn);
```