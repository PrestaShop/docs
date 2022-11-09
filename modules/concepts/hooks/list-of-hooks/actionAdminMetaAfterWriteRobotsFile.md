---
menuTitle: actionAdminMetaAfterWriteRobotsFile
Title: actionAdminMetaAfterWriteRobotsFile
hidden: true
hookTitle: 
files:
  - classes/Tools.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionAdminMetaAfterWriteRobotsFile

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - classes/Tools.php

## Hook call with parameters

```php
Hook::exec('actionAdminMetaAfterWriteRobotsFile', [
                'rb_data' => $robots_content,
                'write_fd' => &$write_fd,
            ]);
```