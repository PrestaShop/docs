---
Title: actionCarrierUpdate
hidden: true
hookTitle: 'Carrier Update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminCarriersController.php'
        file: controllers/admin/AdminCarriersController.php
locations:
    - 'back office'
type: action
hookAliases: actionCarrierUpdate
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when a carrier is updated'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCarrierUpdate', [
                                    'id_carrier' => (int) $current_carrier->id,
                                    'carrier' => $new_carrier,
                                ]);
```
