---
menuTitle: displayCartModalContent
Title: displayCartModalContent
hidden: true
hookTitle: Content of Add-to-cart modal
files:
  - themes/classic/modules/ps_shoppingcart/modal.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayCartModalContent

## Informations

{{% notice tip %}}
**Content of Add-to-cart modal:** 

This hook displays content in the middle of the window that appears after adding product to cart
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/modules/ps_shoppingcart/modal.tpl

## Hook call with parameters

```php
{hook h='displayCartModalContent' product=$product}
```