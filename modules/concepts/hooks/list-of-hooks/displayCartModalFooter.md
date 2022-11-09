---
menuTitle: displayCartModalFooter
Title: displayCartModalFooter
hidden: true
hookTitle: Bottom of Add-to-cart modal
files:
  - themes/classic/modules/ps_shoppingcart/modal.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayCartModalFooter

## Informations

{{% notice tip %}}
**Bottom of Add-to-cart modal:** 

This hook displays content in the bottom of window that appears after adding product to cart
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/modules/ps_shoppingcart/modal.tpl

## Hook call with parameters

```php
{hook h='displayCartModalFooter' product=$product}
```