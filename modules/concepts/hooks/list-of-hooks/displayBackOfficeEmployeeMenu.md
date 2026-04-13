---
Title: displaybackOfficeEmployeeMenu
hidden: true
hookTitle: 'Administration Employee menu'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Twig/Component/EmployeeDropdown.php'
        file: src/PrestaShopBundle/Twig/Component/EmployeeDropdown.php
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
$this->hookDispatcher->dispatchWithParameters(
                'displayBackOfficeEmployeeMenu',
                [
                    'links' => $menuLinksCollections,
                ]
            );
```