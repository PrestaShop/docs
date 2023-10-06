---
menuTitle: actionSearch
Title: actionSearch
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Search/SearchProductSearchProvider.php'
        file: src/Adapter/Search/SearchProductSearchProvider.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

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
