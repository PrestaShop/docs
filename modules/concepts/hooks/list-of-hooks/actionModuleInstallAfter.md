---
menuTitle: actionModuleInstallAfter
Title: actionModuleInstallAfter
hidden: true
hookTitle: actionModuleInstallAfter
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php'
        file: classes/module/Module.php
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
Hook::exec('actionModuleInstallAfter', ['object' => $this])
```
