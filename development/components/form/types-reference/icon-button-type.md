---
title: IconButtonType
---

# IconButtonType

A form button with material icon.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [IconButtonType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/IconButtonType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| icon | `string` | | The icon to display |
| type | `string` | | The button type (link, ...) |

## Code example

- [FooterType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/Product/FooterType.php#L99-L107)

```php
$builder->add('catalog', IconButtonType::class, [
    'label' => $this->trans('Go to catalog', 'Admin.Catalog.Feature'),
    'type' => 'link',
    'icon' => 'arrow_back_ios',
    'attr' => [
        'class' => 'btn-outline-secondary border-white go-to-catalog-button',
        'href' => $this->router->generate('admin_products_v2_index', ['offset' => 'last', 'limit' => 'last']),
    ],
])
```

## Preview example

{{< figure src="../img/icon-button-type.png" title="IconButtonType rendered in form example" >}}
