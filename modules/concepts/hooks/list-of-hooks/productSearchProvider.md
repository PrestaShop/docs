---
Title: productSearchProvider
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/ProductListingFrontController.php'
        file: classes/controller/ProductListingFrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
'productSearchProvider',
            ['query' => $query],
            null,
            true
        );
```
