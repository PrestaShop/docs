---
menuTitle: actionWishlistAddProduct
Title: actionWishlistAddProduct
hidden: true
hookTitle: null
files:
    -
        module: blockwishlist
        url: 'https://github.com/PrestaShop/blockwishlist/blob/master/controllers/front/action.php'
        file: modules/blockwishlist/controllers/front/action.php
locations:
    - 'front office'
type: action
hookAliases: null
origin: module
array_return: false
check_exceptions: false
chain: false
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionWishlistAddProduct', [
            'idWishlist' => $idWishList,
            'customerId' => $this->context->customer->id,
            'idProduct' => $id_product,
            'idProductAttribute' => $id_product_attribute,
        ])
```
