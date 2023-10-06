---
menuTitle: actionPresentModule
Title: actionPresentModule
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Module/ModulePresenter.php'
        file: src/Adapter/Presenter/Module/ModulePresenter.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentModule',
            ['presentedModule' => &$result]
        )
```
