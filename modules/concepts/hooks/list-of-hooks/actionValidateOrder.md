---
menuTitle: actionValidateOrder
Title: actionValidateOrder
hidden: true
hookTitle: New orders
files:
  - classes/PaymentModule.php
locations:
  - front office
type: action
hookAliases:
 - newOrder
---

# Hook actionValidateOrder

Aliases: 
 - newOrder



## Information

{{% notice tip %}}
**New orders:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/PaymentModule.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/PaymentModule.php)

## Parameters details

```php
    <?php
    array(
      'cart' => (object) Cart,
      'order' => (object) Order,
      'customer' => (object) Customer,
      'currency' => (object) Currency,
      'orderStatus' => (object) OrderState
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionValidateOrder', [
                'cart' => $this->context->cart,
                'order' => $order,
                'customer' => $this->context->customer,
                'currency' => $this->context->currency,
                'orderStatus' => $order_status,
            ])
```