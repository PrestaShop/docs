---
Title: actionWatermark
hidden: true
hookTitle: Watermark
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/Image/Uploader/ProductImageUploader.php'
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

## Parameters details

```php
    <?php
    array(
      'id_image' => (int) Image ID,
      'id_product' => (int) Product ID
    );
```

## Call of the Hook in the origin file

```php
dispatchWithParameters(
            'actionWatermark',
            ['id_image' => $imageId->getValue(), 'id_product' => $productId]
        )
```
