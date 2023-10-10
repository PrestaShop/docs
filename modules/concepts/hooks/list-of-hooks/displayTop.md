---
menuTitle: displayTop
Title: displayTop
hidden: true
hookTitle: 'Top of pages'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/header.tpl'
        file: 'Classic Theme: templates/checkout/_partials/header.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - top
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays additional elements at the top of your pages'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayTop'}
```
