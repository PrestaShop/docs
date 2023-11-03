---
title: TypeaheadProductCollectionType
---

# TypeaheadProductCollectionType

This form class allows you to select a product, with or without an attribute field.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [TypeaheadProductCollectionType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/TypeaheadProductCollectionType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [ProductInformation](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Product/ProductInformation.php#L343-L351)

```php
$builder->add('related_products', TypeaheadProductCollectionType::class, [
    'remote_url' => $this->context->getLegacyAdminLink('AdminProducts', true, ['ajax' => 1, 'action' => 'productsList', 'forceJson' => 1, 'disableCombination' => 1, 'exclude_packs' => 0, 'excludeVirtuals' => 0, 'limit' => 20]) . '&q=%QUERY',
    'mapping_value' => 'id',
    'mapping_name' => 'name',
    'placeholder' => $this->translator->trans('Search and add a related product', [], 'Admin.Catalog.Help'),
    'template_collection' => '<span class="label">%s</span><i class="material-icons delete">clear</i>',
    'required' => false,
    'label' => $this->translator->trans('Accessories', [], 'Admin.Catalog.Feature'),
])
```


## Preview example

{{< figure src="../img/typeahead-product-collection-type.png" title="TypeaheadProductCollectionType rendered in form using textarea" >}}