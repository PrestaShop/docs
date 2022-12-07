---
menuTitle: actionPresentOrder
Title: actionPresentOrder
hidden: true
hookTitle: Order Presenter
files:
  - src/Adapter/Presenter/Order/OrderPresenter.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionPresentOrder

## Information

{{% notice tip %}}
**Order Presenter:** 

This hook is called before an order is presented
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Order/OrderPresenter.php](src/Adapter/Presenter/Order/OrderPresenter.php)

## Hook call in codebase

```php
Hook::exec('actionPresentOrder',
            ['presentedOrder' => &$orderLazyArray]
        )
```