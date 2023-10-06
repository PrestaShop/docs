---
menuTitle: displayCustomerAccountForm
Title: displayCustomerAccountForm
hidden: true
hookTitle: 'Customer account creation form'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerForm.php'
        file: classes/form/CustomerForm.php
locations:
    - 'front office'
type: display
hookAliases:
    - createAccountForm
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook displays some information on the form to create a customer account'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayCustomerAccountForm')
```
