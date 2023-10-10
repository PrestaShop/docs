---
menuTitle: actionGetAdminToolbarButtons
Title: actionGetAdminToolbarButtons
hidden: true
hookTitle: 'Allows to add buttons in any toolbar in the back office'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows you to define descriptions of buttons to add in any toolbar of the back office'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    [
        'controller' => (AdminController) $currentController,
        'toolbar_extra_buttons_collection' => (ActionsBarButtonsCollection) $toolbarButtonsCollection,
    ]
```

## Call of the Hook in the origin file

```php
Hook::exec('actionGetAdminToolbarButtons', [
                'controller' => $this,
                'toolbar_extra_buttons_collection' => &$toolbarButtonsCollection,
            ])
```
