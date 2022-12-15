---
menuTitle: actionDownloadAttachment
Title: actionDownloadAttachment
hidden: true
hookTitle: 
files:
  - controllers/front/AttachmentController.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionDownloadAttachment

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [controllers/front/AttachmentController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/AttachmentController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionDownloadAttachment', ['attachment' => &$attachment])
```