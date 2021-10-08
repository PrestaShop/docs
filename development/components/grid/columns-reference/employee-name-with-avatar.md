---
title: EmployeeNameWithAvatarColumn reference
menuTitle: EmployeeNameWithAvatarColumn
weight: 60
---

# EmployeeNameWithAvatarColumn Type

This is a special type that allows you to add a column with the employee name and its avatar to your Grid.
You can see how it looks by default:

{{< figure src="../img/employee-name.png" title="Employee name with avatar column" >}}

## Available options

| Properties | Type   | Expected value                       |
| ---------- | ------ | ------------------------------------ |
| **field**  | string | **required** Employee's name field.  |

### field

**type:** `string` **required**

The employee's name field.

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Employee\EmployeeNameWithAvatarColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$employeeColumn = new EmployeeNameWithAvatarColumn('employee');
$employeeColumn->setName('Employee');
$employeeColumn->setOptions([
     'field' => 'employee',
]);

$columns = new ColumnCollection();
$columns->add($employeeColumn);
```
