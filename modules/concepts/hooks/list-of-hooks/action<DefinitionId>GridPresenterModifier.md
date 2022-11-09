---
menuTitle: action<DefinitionId>GridPresenterModifier
Title: action<DefinitionId>GridPresenterModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Presenter/GridPresenter.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<DefinitionId>GridPresenterModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/Core/Grid/Presenter/GridPresenter.php

## Hook call with parameters

```php
dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridPresenterModifier', [
            'presented_grid' => &$presentedGrid,
        ]);
```