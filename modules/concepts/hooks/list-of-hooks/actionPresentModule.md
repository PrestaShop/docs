---
menuTitle: actionPresentModule
Title: actionPresentModule
hidden: true
hookTitle: 
files:
  - src/Adapter/Presenter/Module/ModulePresenter.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPresentModule

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Presenter/Module/ModulePresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Module/ModulePresenter.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentModule',
            ['presentedModule' => &$result]
        )
```