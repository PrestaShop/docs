---
menuTitle: displayMaintenance
Title: displayMaintenance
hidden: true
hookTitle: Maintenance Page
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayMaintenance

## Informations

{{% notice tip %}}
**Maintenance Page:** 

This hook displays new elements on the maintenance page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/FrontController.php

## Hook call with parameters

```php
Hook::exec('displayMaintenance', []),
```