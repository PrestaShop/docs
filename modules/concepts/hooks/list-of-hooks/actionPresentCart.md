---
menuTitle: actionPresentCart
Title: actionPresentCart
hidden: true
hookTitle: Cart Presenter
files:
  - src/Adapter/Presenter/Cart/CartPresenter.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPresentCart

## Information

{{% notice tip %}}
**Cart Presenter:** 

This hook is called before a cart is presented
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Presenter/Cart/CartPresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Cart/CartPresenter.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentCart',
            ['presentedCart' => &$result]
        )
```