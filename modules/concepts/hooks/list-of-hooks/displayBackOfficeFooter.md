---
Title: displayBackOfficeFooter
hidden: true
hookTitle: 'Administration panel footer'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Layout/legacy_layout.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Layout/legacy_layout.html.twig
locations:
    - 'back office'
type: display
hookAliases: displayBackOfficeFooter
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed within the admin panel''s footer'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayBackOfficeFooter', {}) }};
```
