---
menuTitle: actionClearCompileCache
Title: actionClearCompileCache
hidden: true
hookTitle: Clear smarty compile cache
files:
  - classes/Tools.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionClearCompileCache

## Informations

{{% notice tip %}}
**Clear smarty compile cache:** 

This hook is called when smarty's compile cache is cleared
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Tools.php

## Hook call with parameters

```php
Hook::exec('actionClearCompileCache');
```