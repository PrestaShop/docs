---
menuTitle: actionUpdateQuantity
Title: actionUpdateQuantity
hidden: true
hookTitle: Quantity update
files:
  - classes/stock/StockAvailable.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - updateQuantity
---

# Hook actionUpdateQuantity

Aliases: 
 - updateQuantity



## Information

{{% notice tip %}}
**Quantity update:** 

Quantity is updated only when a customer effectively places their order
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/stock/StockAvailable.php](classes/stock/StockAvailable.php)

## Parameters details

```php
    <?php
    array(
      'id_product' => (int) Product ID,
      'id_product_attribute' => (int) Product attribute ID,
      'quantity' => (int) New product quantity
    );
```

## Hook call in codebase

```php
Hook::exec(
                        'actionUpdateQuantity',
                                    [
                                        'id_product' => $id_product,
                                        'id_product_attribute' => 0,
                                        'quantity' => $product_quantity,
                                        'id_shop' => $id_shop,
                                    ]
                    )
```