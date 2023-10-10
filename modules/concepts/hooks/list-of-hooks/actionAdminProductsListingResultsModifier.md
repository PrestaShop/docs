---
menuTitle: actionAdminProductsListingResultsModifier
Title: actionAdminProductsListingResultsModifier
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/AdminProductDataProvider.php'
        file: src/Adapter/Product/AdminProductDataProvider.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      '_ps_version' => (string) PrestaShop version,
      'products' => &(PDOStatement),
      'total' => (int),
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionAdminProductsListingResultsModifier', [
            '_ps_version' => AppKernel::VERSION,
            'products' => &$products,
            'total' => $total,
        ])
```
