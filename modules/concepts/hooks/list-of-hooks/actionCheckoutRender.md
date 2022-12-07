---
menuTitle: actionCheckoutRender
Title: actionCheckoutRender
hidden: true
hookTitle: Modify checkout process
files:
  - controllers/front/OrderController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionCheckoutRender

## Information

{{% notice tip %}}
**Modify checkout process:** 

This hook is called when constructing the checkout process
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderController.php](controllers/front/OrderController.php)

## Hook call in codebase

```php
Hook::exec('actionCheckoutRender', ['checkoutProcess' => &$this->checkoutProcess])
```