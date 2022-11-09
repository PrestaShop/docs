---
menuTitle: action<DefinitionId>GridDataModifier
Title: action<DefinitionId>GridDataModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/GridFactory.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<DefinitionId>GridDataModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/Core/Grid/GridFactory.php

## Hook call with parameters

```php
dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridDataModifier', [
            'data' => &$data,
        ]);
```