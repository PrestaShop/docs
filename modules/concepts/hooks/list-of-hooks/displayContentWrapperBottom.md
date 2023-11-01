---
Title: displayContentWrapperBottom
hidden: true
hookTitle: 'Content wrapper section (bottom)'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl'
        file: 'Classic Theme: templates/layouts/layout-both-columns.tpl'
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-content-only.tpl'
        file: 'Classic Theme: templates/layouts/layout-content-only.tpl'
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-full-width.tpl'
        file: 'Classic Theme: templates/layouts/layout-full-width.tpl'
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-left-column.tpl'
        file: 'Classic Theme: templates/layouts/layout-left-column.tpl'
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-right-column.tpl'
        file: 'Classic Theme: templates/layouts/layout-right-column.tpl'
locations:
    - 'front office'
type: display
hookAliases:
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays new elements in the bottom of the content wrapper'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayContentWrapperBottom'}
```
