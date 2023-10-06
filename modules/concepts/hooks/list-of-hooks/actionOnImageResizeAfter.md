---
menuTitle: actionOnImageResizeAfter
Title: actionOnImageResizeAfter
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ImageManager.php'
        file: classes/ImageManager.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionOnImageResizeAfter', ['dst_file' => $destinationFile, 'file_type' => $fileType])
```
