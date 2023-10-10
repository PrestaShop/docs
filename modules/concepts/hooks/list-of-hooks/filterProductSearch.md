---
menuTitle: filterProductSearch
Title: filterProductSearch
hidden: true
hookTitle: 'Filter search products result'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/blockwishlist/controllers/front/view.php'
        file: modules/blockwishlist/controllers/front/view.php
locations:
    - 'front office'
type: null
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
