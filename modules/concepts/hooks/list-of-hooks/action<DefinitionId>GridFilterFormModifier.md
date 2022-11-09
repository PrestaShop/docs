---
menuTitle: action<DefinitionId>GridFilterFormModifier
Title: action<DefinitionId>GridFilterFormModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Filter/GridFilterFormFactory.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<DefinitionId>GridFilterFormModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/Core/Grid/Filter/GridFilterFormFactory.php

## Hook call with parameters

```php
dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridFilterFormModifier', [
            'filter_form_builder' => $formBuilder,
        ]);
```