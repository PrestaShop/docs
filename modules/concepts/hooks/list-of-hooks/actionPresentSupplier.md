---
Title: actionPresentSupplier
hidden: true
hookTitle: 'Supplier Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Presenter/Supplier/SupplierPresenter.php'
        file: src/Adapter/Presenter/Supplier/SupplierPresenter.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a supplier is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentSupplier', ['presentedSupplier' => &$supplierLazyArray] )
```
