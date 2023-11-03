---
Title: displaybackOfficeEmployeeMenu
hidden: true
hookTitle: 'Administration Employee menu'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php'
        file: src/PrestaShopBundle/Bridge/Smarty/HeaderConfigurator.php
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed in the employee menu'

---

{{% hookDescriptor %}}

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

