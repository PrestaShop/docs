---
Title: actionGetAlternativeSearchPanels
hidden: true
hookTitle: 'Additional search panel'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminSearchController.php'
        file: controllers/admin/AdminSearchController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook allows to add an additional search panel for external providers in PrestaShop back office'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    [
        'previous_search_panels' => (array) $searchPanels,
        'bo_query' => (string) $searchedExpression,
    ]
```

## Call of the Hook in the origin file

```php
'actionGetAlternativeSearchPanels',
            [
                'previous_search_panels' => $searchPanels,
                'bo_query' => $searchedExpression,
            ],
            null,
```
