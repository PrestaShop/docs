---
menuTitle: actionPresentProductListing
Title: actionPresentProductListing
hidden: true
hookTitle: 'Product Listing Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Product/ProductListingPresenter.php'
        file: src/Adapter/Presenter/Product/ProductListingPresenter.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a product listing is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentProductListing',
            ['presentedProduct' => &$productListingLazyArray]
        )
```
