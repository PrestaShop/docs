---
Title: actionCatalogPriceRuleGridQueryBuilderModifier
hidden: true
hookTitle: 'Modify catalog price rule grid query builder'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php'
        file: src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows to alter Doctrine query builder for catalog price rule grid'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($this->gridId) . 'GridQueryBuilderModifier', [
    'search_query_builder' => $searchQueryBuilder,
    'count_query_builder' => $countQueryBuilder,
    'search_criteria' => $searchCriteria,
]);
```
