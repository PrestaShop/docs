---
Title: displayHeader
hidden: true
hookTitle: 'Pages html head section'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Hook.php'
        file: classes/Hook.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: display
hookAliases:
    - Header
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook adds additional elements in the head section of your pages (head section of html)'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayHeader')
```
