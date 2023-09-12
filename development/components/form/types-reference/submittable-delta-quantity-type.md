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
| SubmitableDeltaQuantityInput| Manages delta input and quantity synchronisation |

{{% notice note %}}
Learn more about [Javascript components and how to use them]({{<relref "/8/development/components/global-components">}})
{{% /notice %}}

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

```php
$builder->add('delta_quantity', SubmittableDeltaQuantityType::class)
```
