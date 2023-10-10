---
menuTitle: displayCartModalContent
Title: displayCartModalContent
hidden: true
hookTitle: 'Content of Add-to-cart modal'
files:
    -
        theme: Classic
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
description: 'This hook displays content in the middle of the window that appears after adding product to cart'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCartModalContent' product=$product}
```
