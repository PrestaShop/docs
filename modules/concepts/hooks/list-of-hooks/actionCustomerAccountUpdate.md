---
menuTitle: actionCustomerAccountUpdate
Title: actionCustomerAccountUpdate
hidden: true
hookTitle: 'Successful customer account update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerPersister.php'
        file: classes/form/CustomerPersister.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when a customer updates its account successfully'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerAccountUpdate', [
                'customer' => $customer,
            ])
```
