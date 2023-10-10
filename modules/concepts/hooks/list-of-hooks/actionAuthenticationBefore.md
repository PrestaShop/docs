---
Title: actionAuthenticationBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerLoginForm.php'
        file: classes/form/CustomerLoginForm.php
locations:
    - 'front office'
type: action
hookAliases:
    - actionBeforeAuthentication
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAuthenticationBefore')
```
