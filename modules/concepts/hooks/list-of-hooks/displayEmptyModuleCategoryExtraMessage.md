---
menuTitle: displayEmptyModuleCategoryExtraMessage
Title: displayEmptyModuleCategoryExtraMessage
hidden: true
hookTitle: Extra message to display for an empty modules category
files:
  - src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayEmptyModuleCategoryExtraMessage

## Information

{{% notice tip %}}
**Extra message to display for an empty modules category:** 

This hook allows to add an extra message to display in the Module manager page when a category doesn't have any module
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig](src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig)

## Parameters details

```html.twig
    {
        'category_name': (string) categoryName
    }
```

## Hook call in codebase

```php
{{ renderhook('displayEmptyModuleCategoryExtraMessage', {'category_name': category.name}) }}
```