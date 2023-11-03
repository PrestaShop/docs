---
Title: actionExportGDPRData
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/psgdpr/psgdpr.php'
        file: modules/psgdpr/psgdpr.php
locations:
    - 'front office'
type: action
hookAliases: 
'Hook origin': module
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionExportGDPRData', $customer, $module['id_module'])
```
