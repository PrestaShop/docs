---
Title: actionWatermark
hidden: true
hookTitle: 'Watermark'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Import/ImageCopier.php'
        file: src/Adapter/Import/ImageCopier.php
locations:
    - 'front office'
type: action
hookAliases: actionWatermark
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters(
                    'actionWatermark',
                    [
                        'id_image' => $imageId,
                        'id_product' => $entityId,
                    ]
                );
```
