---
Title: actionClearCompileCache
hidden: true
hookTitle: 'Clear smarty compile cache'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php'
        file: classes/Tools.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is called when smarty's compile cache is cleared"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionClearCompileCache')
```
