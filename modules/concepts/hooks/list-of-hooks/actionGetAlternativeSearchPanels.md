---
menuTitle: actionGetAlternativeSearchPanels
Title: actionGetAlternativeSearchPanels
hidden: true
hookTitle: Additional search panel
files:
  - controllers/admin/AdminSearchController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionGetAlternativeSearchPanels

## Information

{{% notice tip %}}
**Additional search panel:** 

This hook allows to add an additional search panel for external providers in PrestaShop back office
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [controllers/admin/AdminSearchController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminSearchController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

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