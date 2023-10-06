---
menuTitle: actionNewsletterRegistrationBefore
Title: actionNewsletterRegistrationBefore
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/ps_emailsubscription/ps_emailsubscription.php'
        file: modules/ps_emailsubscription/ps_emailsubscription.php
locations:
    - 'front office'
type: action
hookAliases: null
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
            'actionNewsletterRegistrationBefore',
            [
                'hookName' => $hookName,
                'email' => $_POST['email'],
                'action' => $_POST['action'],
                'hookError' => &$hookError,
            ]
        )
```
