---
menuTitle: actionPresentOrder
Title: actionPresentOrder
hidden: true
hookTitle: Order Presenter
files:
  - src/Adapter/Presenter/Order/OrderPresenter.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPresentOrder

## Information

{{% notice tip %}}
**Order Presenter:** 

This hook is called before an order is presented
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Presenter/Order/OrderPresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Order/OrderPresenter.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentOrder',
            ['presentedOrder' => &$orderLazyArray]
        )
```