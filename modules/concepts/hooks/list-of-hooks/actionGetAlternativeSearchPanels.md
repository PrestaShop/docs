---
menuTitle: actionGetAlternativeSearchPanels
Title: actionGetAlternativeSearchPanels
hidden: true
hookTitle: Additional search panel
files:
  - controllers/admin/AdminSearchController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionGetAlternativeSearchPanels

## Information

{{% notice tip %}}
**Additional search panel:** 

This hook allows to add an additional search panel for external providers in PrestaShop back office
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminSearchController.php](controllers/admin/AdminSearchController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Parameters details

```php
    <?php
    [
        'previous_search_panels' => (array) $searchPanels,
        'bo_query' => (string) $searchedExpression,
    ]
```

## Hook call in codebase

```php
Hook::exec(
            'actionGetAlternativeSearchPanels',
            [
                'previous_search_panels' => $searchPanels,
                'bo_query' => $searchedExpression,
            ],
            null,
            true
        )
```