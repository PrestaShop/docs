---
menuTitle: actionProductDelete
Title: actionProductDelete
hidden: true
hookTitle: Product deletion
files:
  - classes/Product.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductDelete

## Informations

{{% notice tip %}}
**Product deletion:** 

This hook is called when a product is deleted
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Product.php

## Hook call with parameters

```php
Hook::exec('actionProductDelete', ['id_product' => (int) $this->id, 'product' => $this]);
```