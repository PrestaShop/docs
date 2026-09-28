---
Title: actionCatalogPriceRuleGridPresenterModifier
hidden: true
hookTitle: 'Modify catalog price rule grid template data'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/src/Core/Grid/Presenter/GridPresenter.php'
        file: src/Core/Grid/Presenter/GridPresenter.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows to modify data which is about to be used in template for catalog price rule grid'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridPresenterModifier', [
    'presented_grid' => &$presentedGrid,
]);
```
