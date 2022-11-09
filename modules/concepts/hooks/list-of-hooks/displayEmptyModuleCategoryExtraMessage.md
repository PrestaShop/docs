---
menuTitle: displayEmptyModuleCategoryExtraMessage
Title: displayEmptyModuleCategoryExtraMessage
hidden: true
hookTitle: Extra message to display for an empty modules category
files:
  - src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayEmptyModuleCategoryExtraMessage

## Informations

{{% notice tip %}}
**Extra message to display for an empty modules category:** 

This hook allows to add an extra message to display in the Module manager page when a category doesn't have any module
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig

## Hook call with parameters

```php
{{ renderhook('displayEmptyModuleCategoryExtraMessage', {'category_name': category.name}) }}
```