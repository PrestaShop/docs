---
title: HtmlColumn reference
menuTitle: HtmlColumn
weight: 10
---

# HtmlColumn Type
{{< minver v="1.7.8" title="true" >}}

Displays raw data without any escaping. Can be used to display HTML in grid.

## Available options

| Properties | Type   | Expected value                                               |
| ---------- | ------ | ------------------------------------------------------------ |
| **field**  | string | **required** The record field name that the column displays. |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\HtmlColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$htmlColumn = new HtmlColumn('description');
$htmlColumn->setName('Description');
$htmlColumn->setOptions([
     'field' => 'description',
]);

$columns = new ColumnCollection();
$columns->add($htmlColumn);
```
