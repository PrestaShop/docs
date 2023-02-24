---
menuTitle: action<DefinitionId>GridDefinitionModifier
Title: action<DefinitionId>GridDefinitionModifier
hidden: true
hookTitle: 
files:
  - src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php
locations:
  - front office
  - back office
type: action
hookAliases:
hasExample: true
---

# Hook action&lt;DefinitionId>GridDefinitionModifier

## Information

Hook locations: 
  - front office
  - back office

Hook type: action

Located in: 
  - [src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php)

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridDefinitionModifier', [
    'definition' => $definition,
]);
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demoextendgrid](https://github.com/PrestaShop/example-modules/tree/master/demoextendgrid).

This hook has been implemented as an example in our [modules examples repository - demoextendsymfonyform1](https://github.com/PrestaShop/example-modules/tree/master/demoextendsymfonyform1).

This hook has been implemented as an example in our [modules examples repository - demoextendsymfonyform3](https://github.com/PrestaShop/example-modules/tree/master/demoextendsymfonyform3).