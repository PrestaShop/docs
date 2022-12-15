---
menuTitle: actionOverrideEmployeeImage
Title: actionOverrideEmployeeImage
hidden: true
hookTitle: Get Employee Image
files:
  - classes/Employee.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionOverrideEmployeeImage

## Information

{{% notice tip %}}
**Get Employee Image:** 

This hook is used to get the employee image
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Employee.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Employee.php)

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionOverrideEmployeeImage',
            [
                'employee' => $this,
                'imageUrl' => &$imageUrl,
            ]
        )
```