---
menuTitle: displayCarrierExtraContent
Title: displayCarrierExtraContent
hidden: true
hookTitle: Display additional content for a carrier (e.g pickup points)
files:
  - classes/checkout/DeliveryOptionsFinder.php
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayCarrierExtraContent

## Information

{{% notice tip %}}
**Display additional content for a carrier (e.g pickup points):** 

This hook calls only the module related to the carrier, in order to add options when needed
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/DeliveryOptionsFinder.php](classes/checkout/DeliveryOptionsFinder.php)

## Hook call in codebase

```php
Hook::exec('displayCarrierExtraContent', ['carrier' => $carrier], $moduleId)
```