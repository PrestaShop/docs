---
title: DateTimeColumn reference
menuTitle: DateTimeColumn
weight: 10
---

# DateTimeColumn Type

You can use this column type in your Grid to format datetime values.
It is common to get datetime values (e.g. Created at, Updated at & etc.) from the database and format them before displaying.

## Available options

| Properties  | Type   | Expected value                                                                |
| ----------- | ------ | ----------------------------------------------------------------------------- |
| **field**   | string | **required** The record field name that the column displays.                  |
| **format**  | string | **default:** `Y-m-d H:i:s` The format to use when formatting datetime values. |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\DateTimeColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$dateTimeColumn = new DateTimeColumn('datetime');
$dateTimeColumn->setName('Created at');
$dateTimeColumn->setOptions([
     'field' => 'date_add',     // the field name that has a datetime value
     'format' => 'Y/d/m H:i:s', // define a custom format for the datetime
]);

$columns = new ColumnCollection();
$columns->add($dateTimeColumn);
```
