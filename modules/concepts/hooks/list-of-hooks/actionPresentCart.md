---
menuTitle: actionPresentCart
Title: actionPresentCart
hidden: true
hookTitle: Cart Presenter
files:
  - src/Adapter/Presenter/Cart/CartPresenter.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionPresentCart

## Information

{{% notice tip %}}
**Cart Presenter:** 

This hook is called before a cart is presented
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Cart/CartPresenter.php](src/Adapter/Presenter/Cart/CartPresenter.php)

## Hook call in codebase

```php
Hook::exec('actionPresentCart',
            ['presentedCart' => &$result]
        )
```