---
menuTitle: actionValidateOrderAfter
Title: actionValidateOrderAfter
hidden: true
hookTitle: After validating an order
files:
  - classes/PaymentModule.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionValidateOrderAfter

## Information

{{% notice tip %}}
**After validating an order:** 

This hook is called after validating an order by core
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/PaymentModule.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/PaymentModule.php)

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
Hook::exec(
            'actionValidateOrderAfter',
            [
                'cart' => $this->context->cart,
                'order' => $order ?? null,
                'orders' => $order_list,
                'customer' => $this->context->customer,
                'currency' => $this->context->currency,
                'orderStatus' => new OrderState(isset($order) ? $order->current_state : null),
            ]
        )
```