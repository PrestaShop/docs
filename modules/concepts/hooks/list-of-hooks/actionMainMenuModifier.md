---
Title: actionMainMenuModifier
hidden: true
hookTitle: ''
files:
    -
        module: ps_mainmenu
        url: 'https://github.com/PrestaShop/ps_mainmenu/blob/dev/ps_mainmenu.php'
        file: ps_mainmenu.php
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
Hook::exec('actionMainMenuModifier', ['menu' => &$menu]);
```
