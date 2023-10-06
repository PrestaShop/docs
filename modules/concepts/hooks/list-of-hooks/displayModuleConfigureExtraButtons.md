---
menuTitle: displayModuleConfigureExtraButons
Title: displayModuleConfigureExtraButons
hidden: true
hookTitle: 'Module configuration - After toolbar buttons'
files:
    -
        url: 'https://github.com/PrestaShop/Prestashop/blob/8.0.x/admin-dev/themes/default/template/controllers/modules/configure.tpl'
        file: admin-dev/themes/default/template/controllers/modules/configure.tpl
locations:
    - 'back office'
type: display
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook allows to add toolbar's additional content on module configuration page"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h="displayModuleConfigureExtraButtons" module_name=$module_name}
```
