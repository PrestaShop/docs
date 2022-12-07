---
menuTitle: actionWishlistAddProduct
Title: actionWishlistAddProduct
hidden: true
hookTitle: 
files:
  - modules/blockwishlist/controllers/front/action.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionWishlistAddProduct

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/blockwishlist/controllers/front/action.php](modules/blockwishlist/controllers/front/action.php)

## Hook call in codebase

```php
Hook::exec('actionWishlistAddProduct', [
            'idWishlist' => $idWishList,
            'customerId' => $this->context->customer->id,
            'idProduct' => $id_product,
            'idProductAttribute' => $id_product_attribute,
        ])
```