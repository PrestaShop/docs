---
title: SeverityLevelColumn reference
menuTitle: SeverityLevelColumn
weight: 60
---

# SeverityLevelColumn Type

Use this column to display severity level in your Grid.

## Available options

### field

**type:** `string` **required**

Record field name which is used as severity level.

### with_message

**type:** `bool` **default:** `false`

Whether to show severity level message in addition with numeric severity level value.

## Example usage

```php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Status\SeverityLevelColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$column = new SeverityLevelColumn('severity');
$column->setName('Severity (1-4)');
$column->setOptions([
     'field' => 'severity',
     'with_message' => true,    // enable severity messages
]);

$columns = new ColumnCollection();
$columns->add($column);
```