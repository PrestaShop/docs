---
Title: actionAuthenticationBefore
hidden: true
hookTitle: 'Triggers before customer logs in'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/form/CustomerLoginForm.php'
        file: classes/form/CustomerLoginForm.php
locations:
    - 'front office'
type: action
hookAliases: actionAuthenticationBefore
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Triggers after successful validation of login form, before the login process itself.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAuthenticationBefore');
```
