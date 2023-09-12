---
title: TypeaheadProductPackCollectionType
---

# TypeaheadProductPackCollectionType

This form class allows you to select a product to be included in a pack of products.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [TypeaheadProductPackCollectionType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/TypeaheadProductPackCollectionType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [ProductInformation](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Product/ProductInformation.php#L200-L213)

```php
$builder->add('inputPackItems', TypeaheadProductPackCollectionType::class, [
    'remote_url' => $this->context->getLegacyAdminLink('AdminProducts', true, ['ajax' => 1, 'action' => 'productsList', 'forceJson' => 1, 'excludeVirtuals' => 1, 'limit' => 20]) . '&q=%QUERY',
    'mapping_value' => 'id',
    'mapping_name' => 'name',
    'placeholder' => $this->translator->trans('Search for a product', [], 'Admin.Catalog.Help'),
    'template_collection' => '
        <h4>%s</h4>
        <div class="ref">REF: %s</div>
        <div class="quantity text-md-right">x%s</div>
        <button type="button" class="btn btn-danger btn-sm delete"><i class="material-icons">delete</i></button>
    ',
    'required' => false,
    'label' => $this->translator->trans('Add products to your pack', [], 'Admin.Catalog.Feature'),
])
```

## Preview example

{{< figure src="../img/typeahead-product-pack-collection.png" title="TypeaheadProductPackCollectionType rendered in form using textarea" >}}