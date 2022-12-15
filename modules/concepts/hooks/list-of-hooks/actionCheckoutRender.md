---
menuTitle: actionCheckoutRender
Title: actionCheckoutRender
hidden: true
hookTitle: Modify checkout process
files:
  - controllers/front/OrderController.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionCheckoutRender

## Information

{{% notice tip %}}
**Modify checkout process:** 

This hook is called when constructing the checkout process
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [controllers/front/OrderController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCheckoutRender', ['checkoutProcess' => &$this->checkoutProcess])
```