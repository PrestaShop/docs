---
menuTitle: filterProductSearch
Title: filterProductSearch
hidden: true
hookTitle: Filter search products result
files:
  - modules/blockwishlist/controllers/front/view.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : filterProductSearch

## Informations

{{% notice tip %}}
**Filter search products result:** 

This hook is called in order to allow to modify search product result
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - modules/blockwishlist/controllers/front/view.php

## Hook call with parameters

```php
Hook::exec('filterProductSearch', ['searchVariables' => &$searchVariables]);
```