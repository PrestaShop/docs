---
title: ShopRestrictionCheckboxType
---

# ShopRestrictionCheckboxType

This class displays customized checkbox which is used for shop restriction functionality.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [ShopRestrictionCheckboxType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/ShopRestrictionCheckboxType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [ShopLogosType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Improve/Design/Theme/ShopLogosType.php#L132-L137)

```php
$builder->add($form->getName() . $suffix, ShopRestrictionCheckboxType::class, [
    'attr' => [
        'is_allowed_to_display' => $isAllowedToDisplay,
        'data-shop-restriction-target' => $form->getName(),
    ],
]);
```
