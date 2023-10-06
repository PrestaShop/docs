---
menuTitle: actionListModules
Title: actionListModules
hidden: true
hookTitle: 'Allows you to add your own modules from a remote source in the modules list in the back office.'
files: {  }
locations:
    - 'back office'
type: action
hookAliases: null
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$modulesFromHook = $this->hookManager->exec('actionListModules', [], null, true);
$modulesFromHook = array_values($modulesFromHook ?? []);
```

## Example implementation

This hook has been implemented in the native [ps_distributionapiclient](https://github.com/PrestaShop/ps_distributionapiclient/tree/master) module
