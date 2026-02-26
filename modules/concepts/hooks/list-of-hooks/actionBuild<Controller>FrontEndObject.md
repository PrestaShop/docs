---
Title: actionBuild<Controller>FrontEndObject
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
description: 'This hook is called after the "prestashop" javascript object has been built to be sent to the front end. You can add/edit/remove variables from the array passed by reference. Those variables will be inserted in the "prestashop" javascript object.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionBuild' . $this->getControllerName() . 'FrontEndObject', [
    'obj' => &$object,
]);
```
