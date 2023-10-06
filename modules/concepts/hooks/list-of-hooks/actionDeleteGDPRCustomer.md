---
menuTitle: actionDeleteGDPRCustomer
Title: actionDeleteGDPRCustomer
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/psgdpr/psgdpr.php'
        file: modules/psgdpr/psgdpr.php
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
Hook::exec('actionDeleteGDPRCustomer', $customer, $module['id_module'])
```
