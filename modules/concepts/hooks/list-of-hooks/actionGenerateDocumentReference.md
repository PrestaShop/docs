---
menuTitle: actionGenerateDocumentReference
Title: actionGenerateDocumentReference
hidden: true
hookTitle: 'Modify document reference for Order'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/order/Order.php'
        file: classes/order/Order.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows modules to return custom document references for order'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$reference = Hook::exec('actionGenerateDocumentReference', [
    'type' => 'order',
]);
```
