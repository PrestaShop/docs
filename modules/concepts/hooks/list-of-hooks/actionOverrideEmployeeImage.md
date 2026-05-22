---
Title: actionOverrideEmployeeImage
hidden: true
hookTitle: 'Get Employee Image'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Employee.php'
        file: classes/Employee.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is used to get the employee image'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
'actionOverrideEmployeeImage',
            [
                'employee' => $this,
                'imageUrl' => &$imageUrl,
            ]
        );
```
