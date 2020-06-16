---
title: LinkColumn reference
menuTitle: LinkColumn
weight: 10
---

# LinkColumn Type
{{< minver v="1.7.6" title="true" >}}

This LinkColumn displays a raw field data encapsulated in a link (very useful for adding an edition link on a name, for example).

## Available options

| Properties     | Type   | Expected value                                                                     |
| -------------- | ------ | ---------------------------------------------------------------------------------- |
| **field**      | string | **required** The record field name that the column displays.                              |
| **route** | string | **required** The route used to generate the link url. |
| **route_param_name** | string | **required** The parameter name used by the route to generate the url. |
| **route_param_field** | string | **required** The record field containing the route parameter. |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\LinkColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$linkColumn = new LinkColumn('name_link');
$linkColumn->setName('Name');
$linkColumn->setOptions([
     'field' => 'name',
     'route' => 'admin_category_edit',
     'route_param_name' => 'categoryId',
     'route_param_field' => 'id_category',
]);

$columns = new ColumnCollection();
$columns->add($linkColumn);
```
