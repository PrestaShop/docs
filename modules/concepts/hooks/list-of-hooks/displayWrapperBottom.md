---
Title: displayWrapperBottom
hidden: true
hookTitle: 'Main wrapper section (bottom)'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl'
        file: 'Classic Theme: templates/layouts/layout-both-columns.tpl'
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/checkout.tpl'
        file: 'Classic Theme: templates/checkout/checkout.tpl'
locations:
    - 'front office'
type: display
hookAliases:
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays new elements in the bottom of the main wrapper'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayWrapperBottom'}
```
