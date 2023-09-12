---
title: ImagePreviewType
---

# ImagePreviewType

This form type is used to display an image value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or used just to display an image in a form.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [ImagePreviewType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/ImagePreviewType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| type | `string` | hidden | |
| image_class | `string` | img-fluid | |

## Code example

- [HeaderType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/Product/HeaderType.php#L79-L81)

```php
$builder->add('cover_thumbnail', ImagePreviewType::class, [
    'label' => false,
])
```

## Preview example

{{< figure src="../img/image-preview-type.png" title="ImagePreviewType rendered in form example" >}}
