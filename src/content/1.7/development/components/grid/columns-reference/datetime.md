---
title: DateTimeColumn reference
menuTitle: DateTimeColumn
weight: 10
---

# DateTimeColumn Type
{{< minver v="1.7.5" title="true" >}}

You can use this column type in your Grid to format datetime values.
It is common to get datetime value (e.g. Created at, Updated at & etc.) from database and format them before displaying.

## Available options

| Properties  | Type   | Expected value                                                     |
| ----------- | ------ | ------------------------------------------------------------------ |
| **field**   | string | **required** Record field name which column displays.              |
| **format**  | string | **default:** `Y-m-d H:i:s` Format to use when formatting datetime. |

## Example usage

```php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\DateTimeColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$dateTimeColumn = new DateTimeColumn('datetime');
$dateTimeColumn->setName('Created at');
$dateTimeColumn->setOptions([
     'field' => 'date_add',     // field name that has datetime value
     'format' => 'Y/d/m H:i:s', // define custom format for datetime
]);

$columns = new ColumnCollection();
$columns->add($dateTimeColumn);
```