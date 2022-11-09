---
menuTitle: actionGetProductPropertiesAfter
Title: actionGetProductPropertiesAfter
hidden: true
hookTitle: 
files:
  - classes/Product.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionGetProductPropertiesAfter

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Product.php

## Hook call with parameters

```php
Hook::exec('actionGetProductPropertiesAfter', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ]);
```