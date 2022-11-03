---
menuTitle: actionShopDataDuplication
title: actionShopDataDuplication
hidden: true
files:
  - classes/shop/Shop.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionShopDataDuplication

Located in :

  - classes/shop/Shop.php

## Parameters

```php
Hook::exec('actionShopDataDuplication', [
                        'old_id_shop' => (int) $old_id,
                        'new_id_shop' => (int) $this->id,
                    ], $m['id_module']);
```