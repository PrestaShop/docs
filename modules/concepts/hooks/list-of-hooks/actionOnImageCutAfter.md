---
menuTitle: actionOnImageCutAfter
Title: actionOnImageCutAfter
hidden: true
hookTitle: 
files:
  - classes/ImageManager.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionOnImageCutAfter

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/ImageManager.php

## Hook call with parameters

```php
Hook::exec('actionOnImageCutAfter', ['dst_file' => $dstFile, 'file_type' => $fileType]);
```