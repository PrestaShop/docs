---
menuTitle: actionModuleMailAlertSendCustomer
Title: actionModuleMailAlertSendCustomer
hidden: true
hookTitle: null
files:
    -
        module: ps_emailalerts
        url: 'https://github.com/PrestaShop/ps_emailalerts/blob/dev/MailAlert.php'
        file: MailAlert.php
locations:
    - 'front office'
type: action
hookAliases: null
origin: module
array_return: false
check_exceptions: false
chain: false
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionModuleMailAlertSendCustomer',
    [
        'product' => $product_name,
        'link' => $product_link,
        'customer' => $customer,
        'product_obj' => $product,
    ]
)
```
