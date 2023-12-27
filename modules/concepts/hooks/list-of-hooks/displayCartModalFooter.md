---
Title: displayCartModalFooter
hidden: true
hookTitle: Bottom of Add-to-cart modal
files:
    -
      module: ps_shoppingcart
      url: https://github.com/PrestaShop/ps_shoppingcart/blob/dev/modal.tpl
      file: modules/ps_shoppingcart/modal.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/modules/ps_shoppingcart/modal.tpl
      file: themes/classic/modules/ps_shoppingcart/modal.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/modules/ps_shoppingcart/modal.tpl
      file: themes/hummingbird/modules/ps_shoppingcart/modal.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays content in the bottom of window that appears after adding product to cart

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCartModalFooter' product=$product}
```
