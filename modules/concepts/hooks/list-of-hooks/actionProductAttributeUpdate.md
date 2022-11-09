---
menuTitle: actionProductAttributeUpdate
Title: actionProductAttributeUpdate
hidden: true
hookTitle: Product attribute update
files:
  - classes/Product.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductAttributeUpdate

## Informations

{{% notice tip %}}
**Product attribute update:** 

This hook is displayed when a product's attribute is updated
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Product.php

## Hook call with parameters

```php
Hook::exec('actionProductAttributeUpdate', ['id_product_attribute' => (int) $id_product_attribute]);
```