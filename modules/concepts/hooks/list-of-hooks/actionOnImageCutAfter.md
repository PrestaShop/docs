---
menuTitle: actionOnImageCutAfter
Title: actionOnImageCutAfter
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ImageManager.php'
        file: classes/ImageManager.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionOnImageCutAfter', ['dst_file' => $dstFile, 'file_type' => $fileType])
```
