---
menuTitle: actionDownloadAttachment
Title: actionDownloadAttachment
hidden: true
hookTitle: 
files:
  - controllers/front/AttachmentController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionDownloadAttachment

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/AttachmentController.php](controllers/front/AttachmentController.php)

## Hook call in codebase

```php
Hook::exec('actionDownloadAttachment', ['attachment' => &$attachment])
```