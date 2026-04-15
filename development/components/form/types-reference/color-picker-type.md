---
title: ColorPickerType
---

# ColorPickerType

This form class is responsible for creating a color picker field

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [ColorPickerType](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Form/Admin/Type/ColorPickerType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [OrderStateType.php](https://github.com/PrestaShop/PrestaShop/blob/9.1.0/src/PrestaShopBundle/Form/Admin/Configure/ShopParameters/OrderStates/OrderStateType.php#L158-L162)

```php
$builder->add('color', ColorPickerType::class, [
    'required' => false,
    'label' => $this->trans('Color', 'Admin.Shopparameters.Feature'),
    'help' => $this->trans('Background color of this status label. Used both in backoffice and on order tracking page. HTML colors only.', 'Admin.Shopparameters.Help'),
])
```

## Preview example

{{< figure src="../img/color-picker-type.png" title="ColorPickerType rendered in form example" >}}
