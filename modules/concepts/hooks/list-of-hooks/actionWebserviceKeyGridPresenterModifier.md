---
Title: actionWebserviceKeyGridPresenterModifier
hidden: true
hookTitle: 'Modify Webservice grid view data'
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
description: 'This hook allows to alter presented Webservice grid data'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridPresenterModifier', [
    'presented_grid' => &$presentedGrid,
]);
```
