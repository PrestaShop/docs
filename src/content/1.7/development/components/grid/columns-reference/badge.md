---
title: BadgeColumn reference
menuTitle: BadgeColumn
weight: 10
---

# BadgeColumn Type
{{< minver v="1.7.6" title="true" >}}

This basic BadgeColumn displays a raw field data in Grid, associated with a badge.

## Available options

| Properties     | Type   | Expected value                                                                     |
| -------------- | ------ | ---------------------------------------------------------------------------------- |
| **field**      | string | **required** Record field name which column displays.                              |
| **badge_type** | string | **default:** `success` Indicates which field of the row contains the image source. (*Allowed values:* `success, info, danger, warning`) |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\BadgeColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$badgeColumn = new BadgeColumn('total_spent');
$badgeColumn->setName('Sales');
$badgeColumn->setOptions([
     'field' => 'total_spent',
     'badge_type' => 'success',
     'empty_value' => '--',
]);

$columns = new ColumnCollection();
$columns->add($badgeColumn);
```
