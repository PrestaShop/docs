---
Title: actionMailAlterMessageBeforeSend
hidden: true
hookTitle: 'Modify Swift Message before sending'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Mail.php'
        file: classes/Mail.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before the Swift Message is sent in Mail.php'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionMailAlterMessageBeforeSend', [ 'message' => &$email, ])
```
