---
Title: actionSubmitCustomerAddressForm
hidden: true
hookTitle: ''
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/form/CustomerAddressForm.php'
        file: classes/form/CustomerAddressForm.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionSubmitCustomerAddressForm', ['address' => &$address]);
```
