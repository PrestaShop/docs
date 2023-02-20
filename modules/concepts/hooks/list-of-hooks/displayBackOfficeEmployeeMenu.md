---
menuTitle: displaybackOfficeEmployeeMenu
Title: displaybackOfficeEmployeeMenu
hidden: true
hookTitle: Administration Employee menu
files:
  - src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php
locations:
  - front office
type: display
hookAliases:
---

# Hook displaybackOfficeEmployeeMenu

## Information

{{% notice tip %}}
**Administration Employee menu:** 

This hook is displayed in the employee menu
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php)

## Parameters details

```php
    <?php
    [
        'links' => (ActionsBarButtonsCollection) $menuLinksCollections,
    ]
```

## Call of the Hook in the origin file

```php
dispatchWithParameters(
            'displaybackOfficeEmployeeMenu',
            [
                'links' => $menuLinksCollections,
            ]
        )
```
