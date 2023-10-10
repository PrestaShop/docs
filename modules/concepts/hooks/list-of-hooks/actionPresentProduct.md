---
Title: actionPresentProduct
hidden: true
hookTitle: 'Product Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Product/ProductPresenter.php'
        file: src/Adapter/Presenter/Product/ProductPresenter.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a product is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentProduct',
            ['presentedProduct' => &$productLazyArray]
        )
```
