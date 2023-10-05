---
menuTitle: displayCartModalContent
Title: displayCartModalContent
hidden: true
hookTitle: Content of Add-to-cart modal
files:
  - Classic Theme: modules/ps_shoppingcart/modal.tpl
locations:
  - front office
type: display
hookAliases:
origin: theme
---

# Hook displayCartModalContent

## Information

{{% notice tip %}}
**Content of Add-to-cart modal:** 

This hook displays content in the middle of the window that appears after adding product to cart
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: modules/ps_shoppingcart/modal.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/modules/ps_shoppingcart/modal.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayCartModalContent' product=$product}
```