---
Title: actionObjectAddBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php'
        file: classes/ObjectModel.php
locations:
    - 'back office'
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
Hook::exec('actionObjectAddBefore', ['object' => $this])
```
