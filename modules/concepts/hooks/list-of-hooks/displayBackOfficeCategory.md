---
menuTitle: displaybackOfficeCategory
Title: displaybackOfficeCategory
hidden: true
hookTitle: 'Display new elements in the Back Office, tab AdminCategories'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the AdminCategories tab is displayed in the Back Office'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displaybackOfficeCategory') }}
```

