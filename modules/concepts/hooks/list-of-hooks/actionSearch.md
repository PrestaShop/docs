---
menuTitle: actionSearch
Title: actionSearch
hidden: true
hookTitle: 
files:
  - src/Adapter/Search/SearchProductSearchProvider.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionSearch

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Search/SearchProductSearchProvider.php

## Hook call with parameters

```php
Hook::exec('actionSearch', [
                'searched_query' => $queryString,
                'total' => $count,

                // deprecated since 1.7.x
                'expr' => $queryString,
            ]);
```