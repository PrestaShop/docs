---
Title: additionalCustomerFormFields
hidden: true
hookTitle: 'Add fields to the Customer form'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerFormatter.php'
        file: classes/form/CustomerFormatter.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook returns an array of FormFields to add them to the customer registration form'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('additionalCustomerFormFields', ['fields' => &$format], null, true)
```
