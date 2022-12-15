---
menuTitle: actionProductSearchProviderRunQueryAfter
Title: actionProductSearchProviderRunQueryAfter
hidden: true
hookTitle: Runs an action after ProductSearchProviderInterface::RunQuery()
files:
  - classes/controller/ProductListingFrontController.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionProductSearchProviderRunQueryAfter

## Information

{{% notice tip %}}
**Runs an action after ProductSearchProviderInterface::RunQuery():** 

Required to return a previous state of an SQL query or/and to change a result of the SQL query after executing it
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/ProductListingFrontController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/ProductListingFrontController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSearchProviderRunQueryAfter', [
            'query' => $query,
            'result' => $result,
        ])
```