---
menuTitle: actionOnImageResizeAfter
Title: actionOnImageResizeAfter
hidden: true
hookTitle: 
files:
  - classes/ImageManager.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionOnImageResizeAfter

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/ImageManager.php

## Hook call with parameters

```php
Hook::exec('actionOnImageResizeAfter', ['dst_file' => $destinationFile, 'file_type' => $fileType]);
```