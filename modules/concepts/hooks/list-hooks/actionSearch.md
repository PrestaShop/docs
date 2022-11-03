---
menuTitle: actionSearch
title: actionSearch
hidden: true
files:
  - src/Adapter/Search/SearchProductSearchProvider.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionSearch

Located in :

  - src/Adapter/Search/SearchProductSearchProvider.php

## Parameters

```php
Hook::exec('actionSearch', [
                'searched_query' => $queryString,
                'total' => $count,

                // deprecated since 1.7.x
                'expr' => $queryString,
            ]);
```