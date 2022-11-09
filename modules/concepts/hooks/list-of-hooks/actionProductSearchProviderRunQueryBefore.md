---
menuTitle: actionProductSearchProviderRunQueryBefore
Title: actionProductSearchProviderRunQueryBefore
hidden: true
hookTitle: Runs an action before ProductSearchProviderInterface::RunQuery()
files:
  - classes/controller/ProductListingFrontController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductSearchProviderRunQueryBefore

## Informations

{{% notice tip %}}
**Runs an action before ProductSearchProviderInterface::RunQuery():** 

Required to modify an SQL query before executing it
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/ProductListingFrontController.php

## Hook call with parameters

```php
Hook::exec('actionProductSearchProviderRunQueryBefore', [
            'query' => $query,
        ]);
```