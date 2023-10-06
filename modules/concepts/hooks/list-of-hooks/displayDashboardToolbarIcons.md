---
menuTitle: displayDashboardToolbarIcons
Title: displayDashboardToolbarIcons
hidden: true
hookTitle: 'Display new elements in back office page with dashboard, on icons list'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/Blocks/tools.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/Blocks/tools.html.twig
locations:
    - 'back office'
type: display
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the back office with dashboard is displayed'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayDashboardToolbarIcons', {}) }}
```
