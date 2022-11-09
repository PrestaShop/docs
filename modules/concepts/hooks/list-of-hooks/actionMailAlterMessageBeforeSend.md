---
menuTitle: actionMailAlterMessageBeforeSend
Title: actionMailAlterMessageBeforeSend
hidden: true
hookTitle: 
files:
  - classes/Mail.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionMailAlterMessageBeforeSend

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Mail.php

## Hook call with parameters

```php
Hook::exec('actionMailAlterMessageBeforeSend', [
                'message' => &$message,
            ]);
```