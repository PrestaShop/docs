---
Title: actionFrontControllerDetectContextCountryAfter
hidden: true
hookTitle: 'Action after detecting context country'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allows modules to modify the context country after it has been detected via geolocation.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionFrontControllerDetectContextCountryAfter',
    [
        'controller' => $this,
    ]
);
```
