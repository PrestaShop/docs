---
title: GenderType
---

# GenderType

`GenderType` is a child of [ChoiceType](https://symfony.com/doc/6.4/reference/forms/types/choice.html). It is used to display a selection for social titles (genders) and comes pre-populated with the list of genders configured in PrestaShop.

- **Namespace**: `PrestaShopBundle\Form\Admin\Sell\Customer`
- **Fully qualified class name**: `PrestaShopBundle\Form\Admin\Sell\Customer\GenderType`

## Type options

| Option                      | Type    | Default value   | Description                                                                     |
|:----------------------------|:--------|:----------------|:--------------------------------------------------------------------------------|
| choices                     | array   | From provider   | Automatically populated from `GenderByIdChoiceProvider::getChoices()`.          |
| choice_translation_domain   | boolean | false           | Disables translation for choice labels (names come from database).              |
| label                       | string  | 'Social title'  | Default label for the field.                                                    |
| translation_domain          | string  | 'Admin.Global'  | Translation domain for the label.                                               |

## Required Javascript components

None.

## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Sell\Customer\GenderType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('gender_id', GenderType::class, [
            'expanded' => true,
            'required' => false,
            'placeholder' => null,
        ]);
    }
}
```

## Usage with expanded radio buttons

When used with the `expanded` option set to `true`, the genders will be displayed as radio buttons:

```php
<?php

$builder->add('gender_id', GenderType::class, [
    'expanded' => true,   // Display as radio buttons
    'required' => false,  // Make selection optional
    'placeholder' => null, // No empty option
]);
```

## Default dropdown usage

Without the `expanded` option, genders display as a standard dropdown:

```php
<?php

$builder->add('gender_id', GenderType::class);
```

## Notes

- The choices are automatically loaded from the database via `GenderByIdChoiceProvider`
- Gender values correspond to the `id_gender` in the `ps_gender` table
- Gender names are stored in `ps_gender_lang` and displayed in the current language
- This form type is primarily used in customer-related forms (customer creation/editing)
