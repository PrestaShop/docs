---
Title: actionOrderGridFilterFormModifier
hidden: true
hookTitle: 'Modify order grid filters'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/src/Core/Grid/Filter/GridFilterFormFactory.php'
        file: src/Core/Grid/Filter/GridFilterFormFactory.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows to modify filters for order grid'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridFilterFormModifier', [
    'filter_form_builder' => $formBuilder,
]);
```
