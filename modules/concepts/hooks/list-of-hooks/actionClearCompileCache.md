---
menuTitle: actionClearCompileCache
Title: actionClearCompileCache
hidden: true
hookTitle: Clear smarty compile cache
files:
  - classes/Tools.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionClearCompileCache

## Information

{{% notice tip %}}
**Clear smarty compile cache:** 

This hook is called when smarty's compile cache is cleared
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php](classes/Tools.php)

## Hook call in codebase

```php
Hook::exec('actionClearCompileCache')
```