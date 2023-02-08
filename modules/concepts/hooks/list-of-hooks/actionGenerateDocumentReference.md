---
menuTitle: actionGenerateDocumentReference
Title: actionGenerateDocumentReference
hidden: true
hookTitle: Modify document reference for Order
files:
  - classes/order/Order.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionGenerateDocumentReference {{< minver v="8.1" >}}

## Information

{{% notice tip %}}
**Modify document reference for Order:** 

This hook allows modules to return custom document references for orders{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/order/Order.php](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/order/Order.php)

## Call of the Hook in the origin file

```php
$reference = Hook::exec('actionGenerateDocumentReference', [
    'type' => 'order',
]);
```