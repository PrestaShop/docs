---
menuTitle: actionCategoryAdd
Title: actionCategoryAdd
hidden: true
hookTitle: Category creation
files:
  - classes/Category.php
locations:
  - front office
type: action
hookAliases:
 - categoryAddition
---

# Hook actionCategoryAdd

Aliases: 
 - categoryAddition



## Information

{{% notice tip %}}
**Category creation:** 

This hook is displayed when a category is created
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Category.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Category.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCategoryAdd', ['category' => $this])
```