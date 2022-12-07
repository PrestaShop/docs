---
menuTitle: actionSearch
Title: actionSearch
hidden: true
hookTitle: 
files:
  - src/Adapter/Search/SearchProductSearchProvider.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionSearch

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Search/SearchProductSearchProvider.php](src/Adapter/Search/SearchProductSearchProvider.php)

## Parameters details

```php
    <?php
    array(
      'expr' => (string) Search query,
      'total' => (int) Amount of search results
    );
```

## Hook call in codebase

```php
Hook::exec('actionSearch', [
                'searched_query' => $queryString,
                'total' => $count,

                // deprecated since 1.7.x
                'expr' => $queryString,
            ])
```