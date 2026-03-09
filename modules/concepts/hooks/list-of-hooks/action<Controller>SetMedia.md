---
Title: action<Controller>SetMedia
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
description: 'This hook is called after a Front Controller has registered its Stylesheets and Javascripts. You can register more files in this hook.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('action' . $this->getControllerName() . 'SetMedia');
```
