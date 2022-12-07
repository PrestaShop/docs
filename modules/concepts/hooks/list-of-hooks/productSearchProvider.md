---
menuTitle: productSearchProvider
Title: productSearchProvider
hidden: true
hookTitle: 
files:
  - classes/controller/ProductListingFrontController.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook productSearchProvider

## Information

Hook locations: 
  - frontoffice

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/ProductListingFrontController.php](classes/controller/ProductListingFrontController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec(
            'productSearchProvider',
            ['query' => $query],
            null,
            true
        )
```