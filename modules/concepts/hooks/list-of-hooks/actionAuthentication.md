---
Title: actionAuthentication
hidden: true
hookTitle: 'Successful customer authentication'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerLoginForm.php'
        file: classes/form/CustomerLoginForm.php
locations:
    - 'front office'
type: action
hookAliases:
    - authentication
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after a customer successfully signs in'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAuthentication', ['customer' => $this->context->customer])
```
