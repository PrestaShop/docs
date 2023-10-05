---
menuTitle: displayCartModalFooter
Title: displayCartModalFooter
hidden: true
hookTitle: Bottom of Add-to-cart modal
files:
  - Classic Theme: modules/ps_shoppingcart/modal.tpl
locations:
  - front office
type: display
hookAliases:
origin: theme
---

# Hook displayCartModalFooter

## Information

{{% notice tip %}}
**Bottom of Add-to-cart modal:** 

This hook displays content in the bottom of window that appears after adding product to cart
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: modules/ps_shoppingcart/modal.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/modules/ps_shoppingcart/modal.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayCartModalFooter' product=$product}
```