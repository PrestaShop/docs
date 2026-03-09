---
Title: display<Controller>Header
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called in the construction of the HOOK_HEADER Smarty variable. It is used for common front page header content.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->context->smarty->assign([
    'HOOK_HEADER' => Hook::exec('displayHeader')
        . Hook::exec('display' . $this->getControllerName() . 'Header'),
]);
```
