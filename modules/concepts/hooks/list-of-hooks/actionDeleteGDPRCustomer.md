---
Title: actionDeleteGDPRCustomer
hidden: true
hookTitle: 
files:
    -
        module: psgdpr
        url: 'https://github.com/PrestaShop/psgdpr/blob/master/src/Service/CustomerService.php'
        file: modules/psgdpr/src/Service/CustomerService.php
locations:
    - 'front office'
type: action
hookAliases: 
origin: module
array_return: false
check_exceptions: false
chain: false
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionDeleteGDPRCustomer', $customer, $module['id_module'])
```
