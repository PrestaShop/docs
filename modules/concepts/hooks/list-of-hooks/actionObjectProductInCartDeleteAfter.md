---
menuTitle: actionObjectProductInCartDeleteAfter
Title: actionObjectProductInCartDeleteAfter
hidden: true
hookTitle: Cart product removal
files:
  - controllers/front/CartController.php
locations:
  - back office
  - front office
type: action
hookAliases:
---

# Hook actionObjectProductInCartDeleteAfter

## Information

{{% notice tip %}}
**Cart product removal:** 

This hook is called after a product is removed from a cart
{{% /notice %}}

Hook locations: 
  - back office
  - front office

Hook type: action

Located in: 
  - [controllers/front/CartController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/CartController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionObjectProductInCartDeleteAfter', $data)
```