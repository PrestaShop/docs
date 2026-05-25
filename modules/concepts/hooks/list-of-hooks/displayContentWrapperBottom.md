---
Title: displayContentWrapperBottom
hidden: true
hookTitle: 'Content wrapper section (bottom)'
files:
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/index.tpl
      file: themes/hummingbird/templates/index.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/layouts/layout-both-columns.tpl
      file: themes/hummingbird/templates/layouts/layout-both-columns.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl
      file: themes/classic/templates/layouts/layout-both-columns.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/layouts/layout-content-only.tpl
      file: themes/hummingbird/templates/layouts/layout-content-only.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-content-only.tpl
      file: themes/classic/templates/layouts/layout-content-only.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/layouts/layout-full-width.tpl
      file: themes/hummingbird/templates/layouts/layout-full-width.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-full-width.tpl
      file: themes/classic/templates/layouts/layout-full-width.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/layouts/layout-left-column.tpl
      file: themes/hummingbird/templates/layouts/layout-left-column.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-left-column.tpl
      file: themes/classic/templates/layouts/layout-left-column.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/layouts/layout-right-column.tpl
      file: themes/hummingbird/templates/layouts/layout-right-column.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-right-column.tpl
      file: themes/classic/templates/layouts/layout-right-column.tpl
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
{hook h="displayContentWrapperBottom"}
```
