---
menuTitle: actionSearch
Title: actionSearch
hidden: true
hookTitle: 
files:
  - src/Adapter/Search/SearchProductSearchProvider.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionSearch

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Search/SearchProductSearchProvider.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Search/SearchProductSearchProvider.php)

## Parameters details

```php
    <?php
    array(
      'expr' => (string) Search query,
      'total' => (int) Amount of search results
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionSearch', [
                'searched_query' => $queryString,
                'total' => $count,

                // deprecated since 1.7.x
                'expr' => $queryString,
            ])
```