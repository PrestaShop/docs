---
menuTitle: actionGetProductPropertiesAfterUnitPrice
Title: actionGetProductPropertiesAfterUnitPrice
hidden: true
hookTitle: Product Properties
files:
  - classes/Product.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionGetProductPropertiesAfterUnitPrice

## Informations

{{% notice tip %}}
**Product Properties:** 

This hook is called after defining the properties of a product
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Product.php

## Hook call with parameters

```php
Hook::exec('actionGetProductPropertiesAfterUnitPrice', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ]);
```