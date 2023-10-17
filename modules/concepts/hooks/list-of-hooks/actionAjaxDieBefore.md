---
Title: actionAjaxDieBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php'
        file: classes/controller/Controller.php
locations:
    - 'front office'
type: action
hookAliases:
    - actionBeforeAjaxDie
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAjaxDieBefore', ['controller' => $controller, 'method' => $method, 'value' => $value])
```
