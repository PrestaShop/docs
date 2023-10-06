---
menuTitle: actionProductSearchProviderRunQueryBefore
Title: actionProductSearchProviderRunQueryBefore
hidden: true
hookTitle: 'Runs an action before ProductSearchProviderInterface::RunQuery()'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/ProductListingFrontController.php'
        file: classes/controller/ProductListingFrontController.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Required to modify an SQL query before executing it'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSearchProviderRunQueryBefore', [
            'query' => $query,
        ])
```
