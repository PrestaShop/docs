---
menuTitle: actionGetProductPropertiesBefore
title: actionGetProductPropertiesBefore
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionGetProductPropertiesBefore

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('actionGetProductPropertiesBefore', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ]);
```