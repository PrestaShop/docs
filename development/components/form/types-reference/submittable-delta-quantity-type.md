---
title: SubmittableDeltaQuantityType
---

# SubmittableDeltaQuantityType

Wraps SubmittableInput and DeltaQuantity components to work together.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [SubmittableDeltaQuantityType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/SubmittableDeltaQuantityType.php)

## Required Javascript components

| Component                                                   | Description                         |
|:------------------------------------------------------------|:------------------------------------|
| ../admin-dev/themes/new-theme/js/components/form/submittable-delta-quantity-input.ts  | Manages delta input and quantity synchronisation |

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

```php
$builder->add('delta_quantity', SubmittableDeltaQuantityType::class)
```
