---
menuTitle: action<Controller>OptionsModifier
Title: action<Controller>OptionsModifier
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
locations:
    - 'back office'
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
Hook::exec('action' . $this->controller_name . 'OptionsModifier', [
            'options' => &$this->fields_options,
            'option_vars' => &$this->tpl_option_vars,
        ])
```
