---
Title: displayBackOfficeTop
hidden: true
hookTitle: 'Administration panel hover the tabs'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Layout/legacy_layout.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Layout/legacy_layout.html.twig
locations:
    - 'back office'
type: display
hookAliases: displayBackOfficeTop
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed on the roll hover of the tabs within the admin panel'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayBackOfficeTop') }};
```