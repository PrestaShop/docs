---
menuTitle: action<DefinitionId>GridQueryBuilderModifier
Title: action<DefinitionId>GridQueryBuilderModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php
locations:
  - front office
  - back office
type: action
hookAliases:
---

# Hook action&lt;DefinitionId>GridQueryBuilderModifier

## Information

Hook locations: 
  - front office
  - back office

Hook type: action

Located in: 
  - [src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php)

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($this->gridId) . 'GridQueryBuilderModifier', [
    'search_query_builder' => $searchQueryBuilder,
    'count_query_builder' => $countQueryBuilder,
    'search_criteria' => $searchCriteria,
]);
```