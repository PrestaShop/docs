---
Title: actionGenerateDocumentReference
hidden: true
hookTitle: 'Modify document reference'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/order/Order.php'
        file: classes/order/Order.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows modules to return custom document references'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionGenerateDocumentReference', [
            'type' => 'order',
        ]);
```
