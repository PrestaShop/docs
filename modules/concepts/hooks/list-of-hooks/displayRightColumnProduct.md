---
Title: displayRightColumnProduct
hidden: true
hookTitle: New elements on the product page (right column)
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl
      file: themes/classic/templates/layouts/layout-both-columns.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/layouts/layout-both-columns.tpl
      file: themes/hummingbird/templates/layouts/layout-both-columns.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/layouts/layout-right-column.tpl
      file: themes/hummingbird/templates/layouts/layout-right-column.tpl

locations:
    - front office
type: display
hookAliases:
    - extraRight 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays new elements in the right-hand column of the product page

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayRightColumnProduct'}
```
