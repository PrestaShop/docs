---
Title: actionWatermark
hidden: true
hookTitle: 'Watermark'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/ImageManager.php'
        file: classes/ImageManager.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/webservice/WebserviceSpecificManagementImages.php'
        file: classes/webservice/WebserviceSpecificManagementImages.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Import/ImageCopier.php'
        file: src/Adapter/Import/ImageCopier.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Product/Image/Uploader/ProductImageUploader.php'
        file: src/Adapter/Product/Image/Uploader/ProductImageUploader.php
locations:
    - 'front office'
type: action
hookAliases:
    - watermark
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionWatermark', ['id_image' => $id_image, 'id_product' => $id_entity])
```
