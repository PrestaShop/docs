---
title: LinkColumn reference
menuTitle: LinkColumn
weight: 10
---

# LinkColumn Type
{{< minver v="1.7.6" title="true" >}}

This LinkColumn displays a raw field data encapsulated in a link (very useful to add an edition link on a name for example).

## Available options

| Properties     | Type   | Expected value                                                                     |
| -------------- | ------ | ---------------------------------------------------------------------------------- |
| **field**      | string | **required** Record field name which column displays.                              |
| **route** | string | **required** Route used to generated link url. |
| **route_param_name** | string | **required** Parameter name used by the route to generate the url. |
| **route_param_field** | string | **required** Record field containing the route parameter. |

## Example usage

```php
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