---
menuTitle: actionProductAttributeDelete
Title: actionProductAttributeDelete
hidden: true
hookTitle: Product attribute deletion
files:
  - classes/Product.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductAttributeDelete

## Informations

{{% notice tip %}}
**Product attribute deletion:** 

This hook is displayed when a product's attribute is deleted
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Product.php

## Hook call with parameters

```php
Hook::exec('actionProductAttributeDelete', ['id_product_attribute' => 0, 'id_product' => (int) $this->id, 'deleteAllAttributes' => true]);
```