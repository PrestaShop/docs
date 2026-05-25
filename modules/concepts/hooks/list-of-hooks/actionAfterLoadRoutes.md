---
Title: actionAfterLoadRoutes
hidden: true
hookTitle: 'Triggers after loading routes'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Dispatcher.php'
        file: classes/Dispatcher.php
locations:
    - 'front office'
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allow modules to modify routes in any way or add their own multilanguage routes.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

This hook was added in {{< minver v="8.1.2" >}}.

```php
Hook::exec('actionAfterLoadRoutes', ['dispatcher' => $this, 'id_shop' => $id_shop]);
```

Parameter `$id_shop` has been added in version {{< minver v="8.1.5" >}}.