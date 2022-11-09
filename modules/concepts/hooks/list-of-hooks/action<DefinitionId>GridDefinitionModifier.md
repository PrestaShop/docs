---
menuTitle: action<DefinitionId>GridDefinitionModifier
Title: action<DefinitionId>GridDefinitionModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<DefinitionId>GridDefinitionModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php

## Hook call with parameters

```php
dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridDefinitionModifier', [
            'definition' => $definition,
        ]);
```