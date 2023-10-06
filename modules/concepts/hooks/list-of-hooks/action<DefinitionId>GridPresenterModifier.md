---
menuTitle: action<DefinitionId>GridPresenterModifier
Title: action<DefinitionId>GridPresenterModifier
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Presenter/GridPresenter.php'
        file: src/Core/Grid/Presenter/GridPresenter.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchWithParameters('action' . Container::camelize($definition->getId()) . 'GridPresenterModifier', [
            'presented_grid' => &$presentedGrid,
        ])
```
