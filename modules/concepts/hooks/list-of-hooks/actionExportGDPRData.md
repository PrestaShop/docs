---
Title: actionExportGDPRData
hidden: true
hookTitle: ''
files:
    -
        module: psgdpr
        url: 'https://github.com/PrestaShop/psgdpr/blob/dev/psgdpr.php'
        file: psgdpr.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: module
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionExportGDPRData', $customer, $module['id_module'])
```
