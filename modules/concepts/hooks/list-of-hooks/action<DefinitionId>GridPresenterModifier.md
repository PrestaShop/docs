---
menuTitle: action<DefinitionId>GridPresenterModifier
Title: action<DefinitionId>GridPresenterModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Presenter/GridPresenter.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook action<DefinitionId>GridPresenterModifier

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Presenter/GridPresenter.php](src/Core/Grid/Presenter/GridPresenter.php)

## Hook call in codebase

```php
dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridPresenterModifier', [
            'presented_grid' => &$presentedGrid,
        ])
```