---
menuTitle: displayLeftColumnProduct
Title: displayLeftColumnProduct
hidden: true
hookTitle: 'New elements on the product page (left column)'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl'
        file: 'Classic Theme: templates/layouts/layout-both-columns.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - extraLeft
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays new elements in the left-hand column of the product page'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayLeftColumnProduct' product=$product category=$category}
```
