---
menuTitle: actionAdminProductsListingResultsModifier
Title: actionAdminProductsListingResultsModifier
hidden: true
hookTitle: 
files:
  - src/Adapter/Product/AdminProductDataProvider.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminProductsListingResultsModifier

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/Adapter/Product/AdminProductDataProvider.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/AdminProductDataProvider.php)

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