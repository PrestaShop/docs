---
title: TranslatableChoiceType
---

# TranslatableChoiceType

Class TranslatableChoiceType adds translatable choice types with custom inner type to forms. Language selection uses a dropdown.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [TranslatableChoiceType](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Form/Admin/Type/TranslatableChoiceType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [OrderStateType](https://github.com/PrestaShop/PrestaShop/blob/9.1.0/src/PrestaShopBundle/Form/Admin/Configure/ShopParameters/OrderStates/OrderStateType.php#L219-L233)

```php
$builder->add('template', TranslatableChoiceType::class, [
    'label' => $this->trans('Template', 'Admin.Shopparameters.Feature'),
    'hint' => $this->trans('Select an email template that will be sent after setting this status.', 'Admin.Shopparameters.Help'),
    'required' => false,
    'choices' => $this->templates,
    'row_attr' => $this->templateAttributes + [
        'class' => 'order_state_template_select',
    ],
    'button' => [
        'label' => $this->trans('Preview', 'Admin.Actions'),
        'icon' => 'visibility',
        'class' => 'btn btn-primary',
        'id' => 'order_state_template_preview',
    ],
])
```
