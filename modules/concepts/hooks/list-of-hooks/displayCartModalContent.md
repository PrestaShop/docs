---
menuTitle: displayCartModalContent
Title: displayCartModalContent
hidden: true
hookTitle: Content of Add-to-cart modal
files:
  - themes/classic/modules/ps_shoppingcart/modal.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayCartModalContent

## Information

{{% notice tip %}}
**Content of Add-to-cart modal:** 

This hook displays content in the middle of the window that appears after adding product to cart
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/modules/ps_shoppingcart/modal.tpl](themes/classic/modules/ps_shoppingcart/modal.tpl)

## Hook call in codebase

```php
{hook h='displayCartModalContent' product=$product}
```