---
menuTitle: actionOutputHTMLBefore
Title: actionOutputHTMLBefore
hidden: true
hookTitle: 'Before HTML output'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is used to filter the whole HTML page before it is rendered (only front)'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionOutputHTMLBefore', ['html' => &$html])
```
