---
title: DateTimeColumn reference
menuTitle: DateTimeColumn
weight: 70
---

# DateTimeColumn Type

You can use this column type in your Grid to format datetime values.
It is common to get datetime value (e.g. Created at, Updated at & etc.) from database and format them before displaying.

## Available options

### field

**type:** `string` **required**

Field name which has datetime value.

### format

**type:** `string` **default:** `Y-m-d H:i:s`

Format to use when formatting datetime.

## Example usage

```php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\DateTimeColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$column = new DateTimeColumn('datetime');
$column->setName('Created at');
$column->setOptions([
     'field' => 'date_add',     // field name that has datetime value
     'format' => 'Y/d/m H:i:s', // define custom format for datetime
]);

$columns = new ColumnCollection();
$columns->add($column);
```