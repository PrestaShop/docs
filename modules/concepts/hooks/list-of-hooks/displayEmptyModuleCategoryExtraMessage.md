---
menuTitle: displayEmptyModuleCategoryExtraMessage
Title: displayEmptyModuleCategoryExtraMessage
hidden: true
hookTitle: 'Extra message to display for an empty modules category'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_empty.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook allows to add an extra message to display in the Module manager page when a category doesn't have any module"

---

{{% hookDescriptor %}}

## Parameters details

```html.twig
    {
        'category_name': (string) categoryName
    }
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayEmptyModuleCategoryExtraMessage', {'category_name': category.name}) }}
```
