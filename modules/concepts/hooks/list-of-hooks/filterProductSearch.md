---
Title: filterProductSearch
hidden: true
hookTitle: 'Filter search products result'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/ProductListingFrontController.php'
        file: classes/controller/ProductListingFrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called in order to allow to modify search product result'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('filterProductSearch', ['searchVariables' => &$searchVariables])
```
