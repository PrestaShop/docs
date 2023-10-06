---
menuTitle: actionCustomerLogoutAfter
Title: actionCustomerLogoutAfter
hidden: true
hookTitle: 'After customer logout'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php'
        file: classes/Customer.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows you to execute code after customer logout'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerLogoutAfter', ['customer' => $this])
```
