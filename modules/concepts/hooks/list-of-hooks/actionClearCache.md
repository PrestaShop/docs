---
menuTitle: actionClearCache
Title: actionClearCache
hidden: true
hookTitle: Clear smarty cache
files:
  - classes/Tools.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionClearCache

## Information

{{% notice tip %}}
**Clear smarty cache:** 

This hook is called when smarty's cache is cleared
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php](classes/Tools.php)

## Hook call in codebase

```php
Hook::exec('actionClearCache')
```