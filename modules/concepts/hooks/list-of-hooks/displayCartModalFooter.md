---
menuTitle: displayCartModalFooter
Title: displayCartModalFooter
hidden: true
hookTitle: Bottom of Add-to-cart modal
files:
  - themes/classic/modules/ps_shoppingcart/modal.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayCartModalFooter

## Information

{{% notice tip %}}
**Bottom of Add-to-cart modal:** 

This hook displays content in the bottom of window that appears after adding product to cart
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/modules/ps_shoppingcart/modal.tpl](themes/classic/modules/ps_shoppingcart/modal.tpl)

## Hook call in codebase

```php
{hook h='displayCartModalFooter' product=$product}
```