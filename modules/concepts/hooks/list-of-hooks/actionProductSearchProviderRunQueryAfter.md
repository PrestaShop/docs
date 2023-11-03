---
Title: actionProductSearchProviderRunQueryAfter
hidden: true
hookTitle: 'Runs an action after ProductSearchProviderInterface::RunQuery()'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/ProductListingFrontController.php'
        file: classes/controller/ProductListingFrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Required to return a previous state of an SQL query or/and to change a result of the SQL query after executing it'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSearchProviderRunQueryAfter', [
            'query' => $query,
            'result' => $result,
        ])
```
