---
menuTitle: actionAdminPreferencesControllerPostProcessBefore
Title: actionAdminPreferencesControllerPostProcessBefore
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php'
        file: src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php
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
dispatchHook('actionAdminPreferencesControllerPostProcessBefore', ['controller' => $this])
```
