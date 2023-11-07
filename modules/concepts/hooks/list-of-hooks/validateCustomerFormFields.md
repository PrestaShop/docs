---
Title: validateCustomerFormFields
hidden: true
hookTitle: 'Customer registration form validation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerForm.php'
        file: classes/form/CustomerForm.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook is called to a module when it has sent additional fields with additionalCustomerFormFields'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('validateCustomerFormFields', ['fields' => $formFields], $moduleId, true)
```
