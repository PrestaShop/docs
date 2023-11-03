---
title: ChoiceCategoriesTreeType
---

# ChoiceCategoriesTreeType

This form class is responsible for creating a category selector using a tree view

- Namespace: `PrestaShopBundle\Form\Admin\Type`
- Reference: [ChoiceCategoriesTreeType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/ChoiceCategoriesTreeType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| label | `boolean` | `false` |  |
| choices | `array` |  |  |
| list | `array` |  |  |
| valid_list | `array` |  |  |
| multiple | `boolean` | `true` | allows multi selection of categories |

## Required Javascript components

| Component                                                       | Description                                                        |
| :-------------------------------------------------------------- | :----------------------------------------------------------------- |
| ../admin-dev/themes/default/js/bundle/category-tree.js | Responsible for category tree expanding and collapsing interactivity |

## Code example

- [ProductInformation.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Product/ProductInformation.php#L320-L325)

```php
$builder->add('categories', ChoiceCategoriesTreeType::class, [
    'label' => $this->translator->trans('Associated categories', [], 'Admin.Catalog.Feature'),
    'list' => $this->nested_categories,
    'valid_list' => $this->categories,
    'multiple' => true,
])
```

## Preview example

{{< figure src="../img/choice-categories-tree.png" title="ChoiceCategoriesTreeType rendered in form example" >}}
