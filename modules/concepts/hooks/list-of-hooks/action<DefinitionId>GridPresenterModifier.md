---
menuTitle: action<DefinitionId>GridPresenterModifier
Title: action<DefinitionId>GridPresenterModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Presenter/GridPresenter.php
locations:
  - front office
type: action
hookAliases:
---

# Hook action&lt;DefinitionId>GridPresenterModifier

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Core/Grid/Presenter/GridPresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Presenter/GridPresenter.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridPresenterModifier', [
            'presented_grid' => &$presentedGrid,
        ])
```