---
Title: actionValidateOrderAfter
hidden: true
hookTitle: 'After validating an order'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/PaymentModule.php'
        file: classes/PaymentModule.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called after validating an order by core'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    [
        'cart' => (Cart|null) $contextCart,
        'order' => (Order|null) $order,
        'orders' => (array) $orderList,
        'customer' => (Customer) $contextCustomer,
        'currency' => (Currency) $contextCurrency,
        'orderStatus' => (OrderState) $orderState,
    ]
```

## Call of the Hook in the origin file

```php
'actionValidateOrderAfter',
            [
                'cart' => $this->context->cart,
                'order' => $order ?? null,
                'orders' => $order_list,
                'customer' => $this->context->customer,
```
