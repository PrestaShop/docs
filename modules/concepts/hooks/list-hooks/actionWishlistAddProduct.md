---
menuTitle: actionWishlistAddProduct
title: actionWishlistAddProduct
hidden: true
files:
  - modules/blockwishlist/controllers/front/action.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionWishlistAddProduct

Located in :

  - modules/blockwishlist/controllers/front/action.php

## Parameters

```php
Hook::exec('actionWishlistAddProduct', [
            'idWishlist' => $idWishList,
            'customerId' => $this->context->customer->id,
            'idProduct' => $id_product,
            'idProductAttribute' => $id_product_attribute,
        ]);
```