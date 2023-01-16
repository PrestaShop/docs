---
menuTitle: action<DefinitionId>GridDataModifier
Title: action<DefinitionId>GridDataModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/GridFactory.php
locations:
  - front office
  - back office
type: action
hookAliases:
---

# Hook action&lt;DefinitionId>GridDataModifier

## Information

Hook locations: 
  - front office
  - back office

Hook type: action

Located in: 
  - [src/Core/Grid/GridFactory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/GridFactory.php)

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridDataModifier', [
    'data' => &$data,
]);
```