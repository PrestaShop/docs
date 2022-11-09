---
menuTitle: actionProductSearchProviderRunQueryAfter
Title: actionProductSearchProviderRunQueryAfter
hidden: true
hookTitle: Runs an action after ProductSearchProviderInterface::RunQuery()
files:
  - classes/controller/ProductListingFrontController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductSearchProviderRunQueryAfter

## Informations

{{% notice tip %}}
**Runs an action after ProductSearchProviderInterface::RunQuery():** 

Required to return a previous state of an SQL query or/and to change a result of the SQL query after executing it
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/ProductListingFrontController.php

## Hook call with parameters

```php
Hook::exec('actionProductSearchProviderRunQueryAfter', [
            'query' => $query,
            'result' => $result,
        ]);
```