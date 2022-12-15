---
menuTitle: actionOnImageCutAfter
Title: actionOnImageCutAfter
hidden: true
hookTitle: 
files:
  - classes/ImageManager.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionOnImageCutAfter

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/ImageManager.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ImageManager.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionOnImageCutAfter', ['dst_file' => $dstFile, 'file_type' => $fileType])
```