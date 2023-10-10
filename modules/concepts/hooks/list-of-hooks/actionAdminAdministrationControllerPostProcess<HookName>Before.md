---
Title: actionAdminAdministrationControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php'
        file: src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php
locations:
    - 'back office'
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

```php
dispatchHook(
            'actionAdminAdministrationControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```
