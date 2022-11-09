---
menuTitle: actionHtaccessCreate
Title: actionHtaccessCreate
hidden: true
hookTitle: After htaccess creation
files:
  - classes/Tools.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionHtaccessCreate

## Informations

{{% notice tip %}}
**After htaccess creation:** 

This hook is displayed after the htaccess creation
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Tools.php

## Hook call with parameters

```php
Hook::exec('actionHtaccessCreate');
```