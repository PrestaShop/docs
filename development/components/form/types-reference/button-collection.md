---
title: ButtonCollectionType
---

# ButtonCollectionType

`ButtonCollectionType` is a form type used to group buttons in a common form group, which is useful for forms that have multiple submit buttons.

- Namespace: `PrestaShopBundle\Form\Admin\Type`
- Reference: [ButtonCollectionType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/ButtonCollectionType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| label | `boolean` | `false` |  |
| name | `string` | `` |  |
| justify_content | `string` | `space-between` |  |
| buttons | `array` | `[]`  |  |

## Code example

- [CombinationItemType.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/Product/Combination/CombinationItemType.php#L150-L183)

```php
$builder->add('actions', ButtonCollectionType::class, [
    'buttons' => [
        'edit' => [
            'type' => IconButtonType::class,
            'options' => [
                'icon' => 'mode_edit',
                'attr' => [
                    'class' => 'edit-combination-item tooltip-link',
                    'data-toggle' => 'pstooltip',
                    'data-original-title' => $this->trans('Edit', 'Admin.Actions'),
                ],
            ],
        ],
        'delete' => [
            'type' => IconButtonType::class,
            'options' => [
                'icon' => 'delete',
                'attr' => [
                    'class' => 'delete-combination-item tooltip-link',
                    'data-modal-title' => $this->trans('Delete item', 'Admin.Notifications.Warning'),
                    'data-modal-message' => $this->trans('Delete selected item?', 'Admin.Notifications.Warning'),
                    'data-modal-apply' => $this->trans('Delete', 'Admin.Actions'),
                    'data-modal-cancel' => $this->trans('Cancel', 'Admin.Actions'),
                    'data-toggle' => 'pstooltip',
                    'data-original-title' => $this->trans('Delete', 'Admin.Actions'),
                ],
            ],
        ],
    ],
    'label' => $this->trans('Actions', 'Admin.Global'),
    'attr' => [
        'class' => 'combination-row-actions',
    ],
])
```

## Preview example

{{< figure src="../img/button-collection.png" title="ButtonCollectionType rendered in form example" >}}
