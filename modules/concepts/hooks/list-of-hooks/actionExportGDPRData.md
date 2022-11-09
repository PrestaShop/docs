---
menuTitle: actionExportGDPRData
Title: actionExportGDPRData
hidden: true
hookTitle: 
files:
  - modules/psgdpr/psgdpr.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionExportGDPRData

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - modules/psgdpr/psgdpr.php

## Hook call with parameters

```php
Hook::exec('actionExportGDPRData', $customer, $module['id_module']);
```