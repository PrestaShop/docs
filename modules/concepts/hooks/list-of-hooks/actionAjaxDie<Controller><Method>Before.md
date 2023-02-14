---
menuTitle: actionAjaxDie<Controller><Method>Before
Title: actionAjaxDie<Controller><Method>Before
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionAjaxDie&lt;Controller>&lt;Method>Before

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/Controller.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php)

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