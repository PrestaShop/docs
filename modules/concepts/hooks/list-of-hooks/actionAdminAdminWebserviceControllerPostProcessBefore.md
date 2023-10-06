---
menuTitle: actionAdminAdminWebserviceControllerPostProcessBefore
Title: actionAdminAdminWebserviceControllerPostProcessBefore
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/WebserviceController.php'
        file: src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/WebserviceController.php
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
dispatchHook('actionAdminAdminWebserviceControllerPostProcessBefore', ['controller' => $this])
```
