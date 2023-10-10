---
menuTitle: actionAjaxDie<Controller><Method>Before
Title: actionAjaxDie<Controller><Method>Before
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php'
        file: classes/controller/Controller.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

### Before {{< minver v="8.1" >}}

```php
Hook::exec('actionAjaxDie' . $controller . $method . 'Before', ['value' => $value])
```

### From {{< minver v="8.1" >}}

```php
Hook::exec('actionAjaxDie' . $controller . $method . 'Before', ['value' => &$value])
```

{{% notice note %}}
Note that the `value` is now passed by reference
{{% /notice %}}
