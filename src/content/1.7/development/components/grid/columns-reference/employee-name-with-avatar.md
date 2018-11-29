---
title: EmployeeNameWithAvatarColumn reference
menuTitle: EmployeeNameWithAvatarColumn
weight: 70
---

# EmployeeNameWithAvatarColumn Type

It is special type of column that allows you to add employee name with avatar column to your Grid.
You can see how it looks be default:

{{< figure src="../img/employee-name.png" title="Employee name with avatar column" >}}

## Available options

### field

**type:** `string` **required**

Employee's name field.

## Example usage

```php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Employee\EmployeeNameWithAvatarColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$column = new EmployeeNameWithAvatarColumn('severity');
$column->setName('Severity (1-4)');
$column->setOptions([
     'field' => 'severity',
     'with_message' => true,    // enable severity messages
]);

$columns = new ColumnCollection();
$columns->add($column);
```
