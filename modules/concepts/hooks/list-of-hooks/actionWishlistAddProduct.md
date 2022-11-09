---
menuTitle: actionWishlistAddProduct
Title: actionWishlistAddProduct
hidden: true
hookTitle: 
files:
  - modules/blockwishlist/controllers/front/action.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionWishlistAddProduct

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - modules/blockwishlist/controllers/front/action.php

## Hook call with parameters

```php
Hook::exec('actionWishlistAddProduct', [
            'idWishlist' => $idWishList,
            'customerId' => $this->context->customer->id,
            'idProduct' => $id_product,
            'idProductAttribute' => $id_product_attribute,
        ]);
```