---
menuTitle: actionMailAlterMessageBeforeSend
title: actionMailAlterMessageBeforeSend
hidden: true
files:
  - classes/Mail.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionMailAlterMessageBeforeSend

Located in :

  - classes/Mail.php

## Parameters

```php
Hook::exec('actionMailAlterMessageBeforeSend', [
                'message' => &$message,
            ]);
```