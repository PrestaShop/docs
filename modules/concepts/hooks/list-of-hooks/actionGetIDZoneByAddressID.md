---
Title: actionGetIDZoneByAddressID
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Address.php'
        file: classes/Address.php
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
$id_zone = Hook::exec('actionGetIDZoneByAddressID', ['id_address' => $id_address])
```
