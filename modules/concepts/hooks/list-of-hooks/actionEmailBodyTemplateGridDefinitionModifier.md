---
Title: actionEmailBodyTemplateGridDefinitionModifier
hidden: true
hookTitle: 'Modify email body template grid definition'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php'
        file: src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows to alter email body template grid columns, actions and filters'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridDefinitionModifier', [
    'definition' => $definition,
]);
```
