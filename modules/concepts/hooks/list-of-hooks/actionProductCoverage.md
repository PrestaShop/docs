---
menuTitle: actionProductCoverage
Title: actionProductCoverage
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/stock/StockManager.php'
        file: classes/stock/StockManager.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

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
