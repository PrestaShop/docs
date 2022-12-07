---
menuTitle: actionProductSearchProviderRunQueryAfter
Title: actionProductSearchProviderRunQueryAfter
hidden: true
hookTitle: Runs an action after ProductSearchProviderInterface::RunQuery()
files:
  - classes/controller/ProductListingFrontController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionProductSearchProviderRunQueryAfter

## Information

{{% notice tip %}}
**Runs an action after ProductSearchProviderInterface::RunQuery():** 

Required to return a previous state of an SQL query or/and to change a result of the SQL query after executing it
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/ProductListingFrontController.php](classes/controller/ProductListingFrontController.php)

## Hook call in codebase

```php
Hook::exec('actionProductSearchProviderRunQueryAfter', [
            'query' => $query,
            'result' => $result,
        ])
```