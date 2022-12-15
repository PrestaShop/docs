---
menuTitle: actionWishlistAddProduct
Title: actionWishlistAddProduct
hidden: true
hookTitle: 
files:
  - modules/blockwishlist/controllers/front/action.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionWishlistAddProduct

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [modules/blockwishlist/controllers/front/action.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/blockwishlist/controllers/front/action.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionWishlistAddProduct', [
            'idWishlist' => $idWishList,
            'customerId' => $this->context->customer->id,
            'idProduct' => $id_product,
            'idProductAttribute' => $id_product_attribute,
        ])
```