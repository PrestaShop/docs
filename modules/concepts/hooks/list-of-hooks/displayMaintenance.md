---
Title: displayMaintenance
hidden: true
hookTitle: 'Maintenance Page'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook displays new elements on the maintenance page'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
'HOOK_MAINTENANCE' => Hook::exec('displayMaintenance'), 'maintenance_text' => Configuration::get('PS_MAINTENANCE_TEXT', (int) $this->context->language->id), 'stylesheets' => $this->getStylesheets(), ])
```
