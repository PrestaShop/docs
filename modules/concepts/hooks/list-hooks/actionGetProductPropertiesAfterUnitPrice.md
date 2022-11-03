---
menuTitle: actionGetProductPropertiesAfterUnitPrice
title: actionGetProductPropertiesAfterUnitPrice
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionGetProductPropertiesAfterUnitPrice

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('actionGetProductPropertiesAfterUnitPrice', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ]);
```