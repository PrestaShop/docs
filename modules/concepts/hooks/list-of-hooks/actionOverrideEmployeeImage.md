---
menuTitle: actionOverrideEmployeeImage
Title: actionOverrideEmployeeImage
hidden: true
hookTitle: Get Employee Image
files:
  - classes/Employee.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionOverrideEmployeeImage

## Information

{{% notice tip %}}
**Get Employee Image:** 

This hook is used to get the employee image
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Employee.php](classes/Employee.php)

## Hook call in codebase

```php
Hook::exec(
            'actionOverrideEmployeeImage',
            [
                'employee' => $this,
                'imageUrl' => &$imageUrl,
            ]
        )
```