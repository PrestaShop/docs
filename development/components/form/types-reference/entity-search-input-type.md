---
title: EntitySearchInputType
---

# EntitySearchInputType

This form type is used for an OneToMany (or ManyToMany) association, it allows to search a list of entities (based on a remote URL) and associate it. It is based on the CollectionType form type which provides prototype features to display a custom template for each associated item.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [EntitySearchInputType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/EntitySearchInputType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [DescriptionType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/Product/Description/DescriptionType.php#L144-L158)

```php
$builder->add('related_products', EntitySearchInputType::class, [
    'label' => $this->trans('Related products', 'Admin.Catalog.Feature'),
    'label_tag_name' => 'h3',
    'entry_type' => RelatedProductType::class,
    'entry_options' => [
        'block_prefix' => 'related_product',
    ],
    'remote_url' => $this->router->generate('admin_products_v2_search_associations', [
        'languageCode' => $this->employeeIsoCode,
        'query' => '__QUERY__',
    ]),
    'min_length' => 3,
    'filtered_identities' => $productId > 0 ? [$productId] : [],
    'placeholder' => $this->trans('Search product', 'Admin.Catalog.Help'),
])
```

## Preview example

{{< figure src="../img/entity-search-input-type.png" title="EntitySearchInputType rendered in form example" >}}
