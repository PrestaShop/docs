---
menuTitle: actionAdminLogsControllerPostProcessBefore
Title: actionAdminLogsControllerPostProcessBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/LogsController.php'
        file: src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/LogsController.php
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
dispatchHook('actionAdminLogsControllerPostProcessBefore', ['controller' => $this])
```
