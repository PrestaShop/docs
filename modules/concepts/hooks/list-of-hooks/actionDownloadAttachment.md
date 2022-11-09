---
menuTitle: actionDownloadAttachment
Title: actionDownloadAttachment
hidden: true
hookTitle: 
files:
  - controllers/front/AttachmentController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionDownloadAttachment

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/AttachmentController.php

## Hook call with parameters

```php
Hook::exec('actionDownloadAttachment', ['attachment' => &$attachment]);
```