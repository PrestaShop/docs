---
Title: actionSubmitAccountBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/RegistrationController.php'
        file: controllers/front/RegistrationController.php
locations:
    - 'front office'
type: action
hookAliases:
    - actionBeforeSubmitAccount
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionSubmitAccountBefore', [], null, true)
```
