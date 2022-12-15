---
menuTitle: actionWatermark
Title: actionWatermark
hidden: true
hookTitle: Watermark
files:
  - src/Adapter/Product/Image/Uploader/ProductImageUploader.php
locations:
  - front office
type: action
hookAliases:
 - watermark
---

# Hook actionWatermark

Aliases: 
 - watermark



## Information

{{% notice tip %}}
**Watermark:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Product/Image/Uploader/ProductImageUploader.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/Image/Uploader/ProductImageUploader.php)

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