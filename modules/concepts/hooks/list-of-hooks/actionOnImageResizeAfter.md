---
menuTitle: actionOnImageResizeAfter
Title: actionOnImageResizeAfter
hidden: true
hookTitle: 
files:
  - classes/ImageManager.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionOnImageResizeAfter

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/ImageManager.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ImageManager.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionOnImageResizeAfter', ['dst_file' => $destinationFile, 'file_type' => $fileType])
```