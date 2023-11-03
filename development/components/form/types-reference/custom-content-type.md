---
title: CustomContentType
---

# CustomContentType

Type is used to add any content at any position of the form, rather than the actual field.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [CustomContentType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/CustomContentType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [CmsPageType.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Improve/Design/Pages/CmsPageType.php#L142-L149)

```php
$builder->add('seo_preview', CustomContentType::class, [
    'label' => $this->trans('SEO preview', 'Admin.Global'),
    'help' => $this->trans('Here is a preview of how your page will appear in search engine results.', 'Admin.Global'),
    'template' => '@PrestaShop/Admin/Improve/Design/Cms/Blocks/seo_preview.html.twig',
    'data' => [
        'cms_url' => $options['cms_preview_url'],
    ],
])
```

## Preview example

{{< figure src="../img/custom-content-type.png" title="CustomContentType rendered in form example" >}}
