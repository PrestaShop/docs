---
Title: actionPresentManufacturer
hidden: true
hookTitle: 'Manufacturer Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Presenter/Manufacturer/ManufacturerPresenter.php'
        file: src/Adapter/Presenter/Manufacturer/ManufacturerPresenter.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a manufacturer is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentManufacturer', ['presentedManufacturer' => &$manufacturerLazyArray] )
```
