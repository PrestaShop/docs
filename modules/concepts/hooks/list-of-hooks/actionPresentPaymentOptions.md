---
menuTitle: actionPresentPaymentOptions
Title: actionPresentPaymentOptions
hidden: true
hookTitle: Payment options Presenter
files:
  - classes/checkout/PaymentOptionsFinder.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPresentPaymentOptions

## Information

{{% notice tip %}}
**Payment options Presenter:** 

This hook is called before payment options are presented
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/checkout/PaymentOptionsFinder.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/PaymentOptionsFinder.php)

## Parameters details

```php
    <?php
    [
        'paymentOptions' => (array) &$paymentOptions,
    ]
```

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentPaymentOptions',
            ['paymentOptions' => &$paymentOptions]
        )
```