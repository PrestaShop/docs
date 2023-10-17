---
Title: actionProductSearchAfter
hidden: true
hookTitle: 'Event triggered after search product completed'
files:
    -
        module: blockwishlist
        url: 'https://github.com/PrestaShop/blockwishlist/blob/master/controllers/front/view.php'
        file: controllers/front/view.php
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
