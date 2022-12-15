---
menuTitle: actionPresentOrderReturn
Title: actionPresentOrderReturn
hidden: true
hookTitle: Order Return Presenter
files:
  - src/Adapter/Presenter/Order/OrderReturnPresenter.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPresentOrderReturn

## Information

{{% notice tip %}}
**Order Return Presenter:** 

This hook is called before an order return is presented
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Presenter/Order/OrderReturnPresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Order/OrderReturnPresenter.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentOrderReturn',
            ['presentedOrderReturn' => &$orderReturnLazyArray]
        )
```