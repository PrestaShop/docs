---
menuTitle: displayCartModalFooter
Title: displayCartModalFooter
hidden: true
hookTitle: 'Bottom of Add-to-cart modal'
files:
    -
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/modules/ps_shoppingcart/modal.tpl'
        file: 'Classic Theme: modules/ps_shoppingcart/modal.tpl'
locations:
    - 'front office'
type: display
hookAliases: null
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays content in the bottom of window that appears after adding product to cart'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCartModalFooter' product=$product}
```
