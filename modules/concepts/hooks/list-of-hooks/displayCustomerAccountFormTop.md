---
menuTitle: displayCustomerAccountFormTop
Title: displayCustomerAccountFormTop
hidden: true
hookTitle: 'Block above the form for create an account'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/RegistrationController.php'
        file: controllers/front/RegistrationController.php
locations:
    - 'front office'
type: display
hookAliases:
    - createAccountTop
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is displayed above the customer's account creation form"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayCustomerAccountFormTop')
```
