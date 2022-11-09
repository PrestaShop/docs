---
menuTitle: actionProductSave
Title: actionProductSave
hidden: true
hookTitle: Saving products
files:
  - classes/Product.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductSave

## Informations

{{% notice tip %}}
**Saving products:** 

This hook is called while saving products
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Product.php

## Hook call with parameters

```php
Hook::exec('actionProductSave', ['id_product' => (int) $this->id, 'product' => $this]);
```