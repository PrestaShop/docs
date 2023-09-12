---
title: TextPreviewType
---

# TextPreviewType

This form type displays a text value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or used just to display data in a form.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [TextPreviewType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/TextPreviewType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| type | `string` | hidden | Input type |
| preview_class | `string` | text-preview | Class to apply on the input |
| prefix | `string` | null | Prefix data to prepend to the value |
| suffix | `string` | null | Suffix data to append to the value |

## Code example

- [SearchedCustomerType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Sell/Customer/SearchedCustomerType.php#L50-L53)

```php
$builder->add('fullname_and_email', TextPreviewType::class, [
    'label' => false,
    'block_prefix' => 'searched_customer_fullname_and_email',
])
```
