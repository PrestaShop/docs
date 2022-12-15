---
menuTitle: actionClearCompileCache
Title: actionClearCompileCache
hidden: true
hookTitle: Clear smarty compile cache
files:
  - classes/Tools.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionClearCompileCache

## Information

{{% notice tip %}}
**Clear smarty compile cache:** 

This hook is called when smarty's compile cache is cleared
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Tools.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionClearCompileCache')
```