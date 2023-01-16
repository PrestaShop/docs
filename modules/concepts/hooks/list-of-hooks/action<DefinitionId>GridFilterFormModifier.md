---
menuTitle: action<DefinitionId>GridFilterFormModifier
Title: action<DefinitionId>GridFilterFormModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Filter/GridFilterFormFactory.php
locations:
  - front office
  - back office
type: action
hookAliases:
---

# Hook action&lt;DefinitionId>GridFilterFormModifier

## Information

Hook locations: 
  - front office
  - back office

Hook type: action

Located in: 
  - [src/Core/Grid/Filter/GridFilterFormFactory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Filter/GridFilterFormFactory.php)

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridFilterFormModifier', [
    'filter_form_builder' => $formBuilder,
]);
```