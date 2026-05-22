---
Title: displayCarrierExtraContent
hidden: true
hookTitle: 'Display additional content for a carrier (e.g pickup points)'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/checkout/DeliveryOptionsFinder.php'
        file: classes/checkout/DeliveryOptionsFinder.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Shipment/DeliveryOptionsProvider.php'
        file: src/Adapter/Shipment/DeliveryOptionsProvider.php
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook calls only the module related to the carrier, in order to add options when needed'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$carrier['extraContent'] = Hook::exec('displayCarrierExtraContent', ['carrier' => $carrier], $moduleId)
```
