---
menuTitle: displayCustomization
Title: displayCustomization
hidden: true
hookTitle: 
files:
  - classes/Product.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayCustomization

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Product.php

## Hook call with parameters

```php
Hook::exec('displayCustomization', ['customization' => $row], (int) $row['id_module']);
```