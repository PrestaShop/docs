---
menuTitle: actionGetAdminToolbarButtons
Title: actionGetAdminToolbarButtons
hidden: true
hookTitle: Allows to add buttons in any toolbar in the back office
files:
  - classes/controller/AdminController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionGetAdminToolbarButtons

## Information

{{% notice tip %}}
**Allows to add buttons in any toolbar in the back office:** 

This hook allows you to define descriptions of buttons to add in any toolbar of the back office
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [classes/controller/AdminController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php)

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