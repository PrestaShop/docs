---
title: DeltaQuantityType
---

# DeltaQuantityType

Quantity field that displays the initial quantity (not editable) and allows editing with delta quantity instead (ex: +5, -8). The input data of this form type is the initial (as a plain integer) however, its output on submit is the delta quantity.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [DeltaQuantityType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/DeltaQuantityType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [BulkCombinationStockType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/Product/Combination/BulkCombinationStockType.php#L78-L86)

```php
$builder->add('delta_quantity', DeltaQuantityType::class, [
    'required' => false,
    'label' => $this->trans('Edit quantity', 'Admin.Catalog.Feature'),
    'disabling_switch' => true,
    'disabling_switch_event' => 'combinationSwitchDeltaQuantity',
    'disabled_value' => function (?array $data) {
        return empty($data['quantity']) && empty($data['delta']);
    },
])
```

## Preview example

{{< figure src="../img/delta-quantity-type.png" title="DeltaQuantityType rendered in form example" >}}
