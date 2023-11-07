---
Title: displaybackOfficeHeader
hidden: true
hookTitle: 'Administration panel header'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
locations:
    - 'back office'
type: display
hookAliases:
    - backOfficeHeader
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed in the header of the admin panel'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displaybackOfficeHeader')
```

