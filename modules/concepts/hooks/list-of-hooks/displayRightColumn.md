---
menuTitle: displayRightColumn
Title: displayRightColumn
hidden: true
hookTitle: 'New elements on a page (right column)'
files:
    -
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl'
        file: 'Classic Theme: templates/layouts/layout-both-columns.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - extraRight
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays new elements in the right-hand column of a page'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayRightColumn'}
```
