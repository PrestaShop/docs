---
menuTitle: actionAdminMetaAfterWriteRobotsFile
title: actionAdminMetaAfterWriteRobotsFile
hidden: true
files:
  - classes/Tools.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionAdminMetaAfterWriteRobotsFile

Located in :

  - classes/Tools.php

## Parameters

```php
Hook::exec('actionAdminMetaAfterWriteRobotsFile', [
                'rb_data' => $robots_content,
                'write_fd' => &$write_fd,
            ]);
```