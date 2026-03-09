---
Title: action<Controller>SetVariables
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called after a Front Controller has set commonly used variables, available for use in the template. You can add/edit/remove variables from the array passed by reference. After the hook execution, this array of variables is assigned to Smarty.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$modulesVariables = array_merge(
    $modulesVariables,
    Hook::exec('action' . $this->getControllerName() . 'SetVariables',
        [
            'templateVars' => &$templateVars,
        ],
        null,
        true
    )
);
```
