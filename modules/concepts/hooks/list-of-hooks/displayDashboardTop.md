---
Title: displayDashboardTop
hidden: true
hookTitle: 'Dashboard Top'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/toolbar.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/toolbar.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Displays the content in the dashboard''s top area'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayDashboardTop') }};
```
