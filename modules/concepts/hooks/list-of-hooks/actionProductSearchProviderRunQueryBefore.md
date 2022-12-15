---
menuTitle: actionProductSearchProviderRunQueryBefore
Title: actionProductSearchProviderRunQueryBefore
hidden: true
hookTitle: Runs an action before ProductSearchProviderInterface::RunQuery()
files:
  - classes/controller/ProductListingFrontController.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionProductSearchProviderRunQueryBefore

## Information

{{% notice tip %}}
**Runs an action before ProductSearchProviderInterface::RunQuery():** 

Required to modify an SQL query before executing it
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/ProductListingFrontController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/ProductListingFrontController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSearchProviderRunQueryBefore', [
            'query' => $query,
        ])
```