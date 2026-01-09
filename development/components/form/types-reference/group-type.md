---
title: GroupType
---

# GroupType

`GroupType` is a child of [ChoiceType](https://symfony.com/doc/6.4/reference/forms/types/choice.html). It is used to display a selection for customer groups and comes pre-populated with the list of customer groups configured in PrestaShop.

- **Namespace**: `PrestaShopBundle\Form\Admin\Sell\Customer`
- **Fully qualified class name**: `PrestaShopBundle\Form\Admin\Sell\Customer\GroupType`

## Type options

| Option                      | Type    | Default value | Description                                                                     |
|:----------------------------|:--------|:--------------|:--------------------------------------------------------------------------------|
| choices                     | array   | From provider | Automatically populated from `GroupByIdChoiceProvider::getChoices()`.           |
| choice_translation_domain   | boolean | false         | Disables translation for choice labels (names come from database).              |

## Required Javascript components

None.

## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Sell\Customer\GroupType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('default_group_id', GroupType::class, [
            'label' => 'Default customer group',
            'required' => false,
            'autocomplete' => true,
            'placeholder' => null,
        ]);
    }
}
```

## Usage with autocomplete

For better UX with many customer groups, enable the autocomplete feature:

```php
<?php

$builder->add('default_group_id', GroupType::class, [
    'label' => 'Default customer group',
    'autocomplete' => true,
    'placeholder' => null,
]);
```

## Multiple selection

When you need to allow selecting multiple groups (e.g., for group access), consider using `MaterialChoiceTableType` with the same choice provider:

```php
<?php

use PrestaShopBundle\Form\Admin\Type\Material\MaterialChoiceTableType;

// Inject GroupByIdChoiceProvider in your form type constructor

$builder->add('group_ids', MaterialChoiceTableType::class, [
    'label' => 'Group access',
    'empty_data' => [],
    'choices' => $this->groupByIdChoiceProvider->getChoices(),
    'display_total_items' => true,
]);
```

## Notes

- The choices are automatically loaded from the database via `GroupByIdChoiceProvider`
- Group values correspond to the `id_group` in the `ps_group` table
- Group names are stored in `ps_group_lang` and displayed in the current language
- Default PrestaShop groups include: Visitor, Guest, Customer
- This form type is primarily used in customer-related forms for assigning customers to groups
