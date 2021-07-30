---
title: SeverityLevelColumn reference
menuTitle: SeverityLevelColumn
weight: 70
---

# SeverityLevelColumn Type
{{< minver v="1.7.5" title="true" >}}

Use this column to display severity level in your Grid.

## Available options

| Properties       | Type   | Expected value                                                                                             |
| ---------------- | ------ | ---------------------------------------------------------------------------------------------------------- |
| **field**        | string | **required** Record field name which is used as severity level.                                            |
| **with_message** | bool   | **default:** `false` Whether to show severity level message in addition with numeric severity level value. |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Status\SeverityLevelColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$severityColumn = new SeverityLevelColumn('severity');
$severityColumn->setName('Severity (1-4)');
$severityColumn->setOptions([
     'field' => 'severity',
     'with_message' => true,    // enable severity messages
]);

$columns = new ColumnCollection();
$columns->add($severityColumn);
```
