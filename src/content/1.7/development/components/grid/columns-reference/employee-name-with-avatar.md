---
title: EmployeeNameWithAvatarColumn reference
menuTitle: EmployeeNameWithAvatarColumn
weight: 60
---

# EmployeeNameWithAvatarColumn Type
{{< minver v="1.7.5" title="true" >}}

It is special type of column that allows you to add employee name with avatar column to your Grid.
You can see how it looks be default:

{{< figure src="../img/employee-name.png" title="Employee name with avatar column" >}}

## Available options

| Properties | Type   | Expected value                       |
| ---------- | ------ | ------------------------------------ |
| **field**  | string | **required** Employee's name field.  |

### field

**type:** `string` **required**

Employee's name field.

## Example usage

```php
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
