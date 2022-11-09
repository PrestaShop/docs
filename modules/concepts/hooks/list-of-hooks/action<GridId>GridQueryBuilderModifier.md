---
menuTitle: action<GridId>GridQueryBuilderModifier
Title: action<GridId>GridQueryBuilderModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<GridId>GridQueryBuilderModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php

## Hook call with parameters

```php
dispatchWithParameters('action' . Container::camelize($this->gridId) . 'GridQueryBuilderModifier', [
            'search_query_builder' => $searchQueryBuilder,
            'count_query_builder' => $countQueryBuilder,
            'search_criteria' => $searchCriteria,
        ]);
```