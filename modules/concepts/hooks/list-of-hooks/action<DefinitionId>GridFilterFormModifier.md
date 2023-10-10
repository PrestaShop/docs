---
menuTitle: action<DefinitionId>GridFilterFormModifier
Title: action<DefinitionId>GridFilterFormModifier
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Filter/GridFilterFormFactory.php'
        file: src/Core/Grid/Filter/GridFilterFormFactory.php
locations:
    - 'front office'
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridFilterFormModifier', [
    'filter_form_builder' => $formBuilder,
]);
```
