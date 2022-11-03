---
menuTitle: actionGetProductPropertiesAfter
title: actionGetProductPropertiesAfter
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionGetProductPropertiesAfter

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('actionGetProductPropertiesAfter', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ]);
```