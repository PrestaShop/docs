---
menuTitle: productSearchProvider
Title: productSearchProvider
hidden: true
hookTitle: 
files:
  - classes/controller/ProductListingFrontController.php
locations:
  - front office
type: 
hookAliases:
---

# Hook productSearchProvider

## Information

Hook locations: 
  - front office

Located in: 
  - [classes/controller/ProductListingFrontController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/ProductListingFrontController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec(
            'productSearchProvider',
            ['query' => $query],
            null,
            true
        )
```