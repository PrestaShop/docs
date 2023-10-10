---
menuTitle: actionNewsletterRegistrationAfter
Title: actionNewsletterRegistrationAfter
hidden: true
hookTitle: 
files:
    -
        module: ps_emailsubscription
        url: 'https://github.com/PrestaShop/ps_emailsubscription/blob/master/ps_emailsubscription.php'
        file: ps_emailsubscription.php
locations:
    - 'front office'
type: action
hookAliases: 
origin: module
array_return: false
check_exceptions: false
chain: false
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionNewsletterRegistrationAfter',
    [
        'hookName' => $hookName,
        'email' => $_POST['email'],
        'action' => $_POST['action'],
        'error' => &$this->error,
    ]
)
```
