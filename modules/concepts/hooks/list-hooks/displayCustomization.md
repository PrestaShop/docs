---
menuTitle: displayCustomization
title: displayCustomization
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : displayCustomization

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('displayCustomization', ['customization' => $row], (int) $row['id_module']);
```