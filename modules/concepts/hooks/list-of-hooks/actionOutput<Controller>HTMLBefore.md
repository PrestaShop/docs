---
Title: actionOutput<Controller>HTMLBefore
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
description: 'This hook is called just before Smarty output the HTML Content of the page. You can edit the HTML passed by reference.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionOutput' . $this->getControllerName() . 'HTMLBefore', ['html' => &$html]);
```
