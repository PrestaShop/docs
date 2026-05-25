---
Title: actionProductSearchAfter
hidden: true
hookTitle: 'Event triggered after search product completed'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/ProductListingFrontController.php'
        file: classes/controller/ProductListingFrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
origin: module
array_return: false
check_exceptions: false
chain: false
description: 'This hook is called after the product search. Parameters are already filter'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSearchAfter', $searchVariables)
```
