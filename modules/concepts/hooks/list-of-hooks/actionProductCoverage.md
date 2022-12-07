---
menuTitle: actionProductCoverage
Title: actionProductCoverage
hidden: true
hookTitle: 
files:
  - classes/stock/StockManager.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionProductCoverage

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/stock/StockManager.php](classes/stock/StockManager.php)

## Hook call in codebase

```php
Hook::exec(
                'actionProductCoverage',
                    [
                        'id_product' => $id_product,
                        'id_product_attribute' => $id_product_attribute,
                        'warehouse' => $warehouse,
                    ]
            )
```