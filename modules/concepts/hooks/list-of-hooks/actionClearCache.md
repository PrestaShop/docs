---
menuTitle: actionClearCache
Title: actionClearCache
hidden: true
hookTitle: Clear smarty cache
files:
  - classes/Tools.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionClearCache

## Informations

{{% notice tip %}}
**Clear smarty cache:** 

This hook is called when smarty's cache is cleared
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Tools.php

## Hook call with parameters

```php
Hook::exec('actionClearCache');
```