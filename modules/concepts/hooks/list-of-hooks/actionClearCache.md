---
menuTitle: actionClearCache
Title: actionClearCache
hidden: true
hookTitle: Clear smarty cache
files:
  - classes/Tools.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionClearCache

## Information

{{% notice tip %}}
**Clear smarty cache:** 

This hook is called when smarty's cache is cleared
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Tools.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionClearCache')
```