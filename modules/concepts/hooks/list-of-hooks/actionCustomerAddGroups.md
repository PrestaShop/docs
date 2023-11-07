---
Title: actionCustomerAddGroups
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php'
        file: classes/Customer.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerAddGroups', ['id_customer' => $this->id, 'groups' => $groups])
```
