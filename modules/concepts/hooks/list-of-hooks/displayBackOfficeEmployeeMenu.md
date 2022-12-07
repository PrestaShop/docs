---
menuTitle: displayBackOfficeEmployeeMenu
Title: displayBackOfficeEmployeeMenu
hidden: true
hookTitle: Administration Employee menu
files:
  - src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayBackOfficeEmployeeMenu

## Information

{{% notice tip %}}
**Administration Employee menu:** 

This hook is displayed in the employee menu
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php](src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php)

## Parameters details

```php
    <?php
    [
        'links' => (ActionsBarButtonsCollection) $menuLinksCollections,
    ]
```

## Hook call in codebase

```php
dispatchWithParameters(
            'displayBackOfficeEmployeeMenu',
            [
                'links' => $menuLinksCollections,
            ]
        )
```