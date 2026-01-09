---
title: LocaleChoiceType
---

# LocaleChoiceType

`LocaleChoiceType` is a child of [ChoiceType](https://symfony.com/doc/6.4/reference/forms/types/choice.html). It is used to display a dropdown selection of available languages/locales configured in PrestaShop. The choices are automatically populated from the shop's language configuration.

- **Namespace**: `PrestaShopBundle\Form\Admin\Type`
- **Fully qualified class name**: `PrestaShopBundle\Form\Admin\Type\LocaleChoiceType`

## Type options

| Option                      | Type    | Default value   | Description                                                                     |
|:----------------------------|:--------|:----------------|:--------------------------------------------------------------------------------|
| placeholder                 | string  | 'Language'      | Placeholder text shown before selection. Translated via Admin.Global domain.    |
| translation_domain          | string  | 'Admin.Global'  | Translation domain for the placeholder.                                         |
| choice_translation_domain   | boolean | false           | Disables translation for choice labels (language names).                        |
| choices                     | array   | From context    | Automatically populated from available shop languages.                          |

## Required Javascript components

None.

## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Type\LocaleChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('locale', LocaleChoiceType::class);
    }
}
```

## Usage with custom placeholder

```php
<?php

$builder->add('locale', LocaleChoiceType::class, [
    'placeholder' => 'Select a language',
]);
```

## Usage in translation forms

This type is commonly used in translation and international-related forms:

```php
<?php

use PrestaShopBundle\Form\Admin\Type\LocaleChoiceType;

// Export translations form
$builder->add('iso_code', LocaleChoiceType::class, [
    'label' => 'Language',
    'placeholder' => false, // No empty option
]);
```

## Choice format

The choices are formatted as key-value pairs where:
- **Key (label)**: Full language name (e.g., "English (English)")
- **Value**: ISO code (e.g., "en")

Example choices array:
```php
[
    'English (English)' => 'en',
    'Francais (French)' => 'fr',
    'Espanol (Spanish)' => 'es',
]
```

## Common use cases

`LocaleChoiceType` is used in several PrestaShop forms:

- **Export Catalogues** - Select language for translation export
- **Modify Translations** - Choose language to translate
- **Export Theme Language** - Select language for theme translation export
- **Copy Language** - Source/target language selection
- **Generate Mails** - Select language for email template generation
- **Import** - Choose language for data import

## Notes

- Languages are loaded from the `LegacyContext` which provides access to the shop's configured languages
- Only active languages installed in the shop are shown
- The list updates automatically when languages are added or removed from the shop
- For multi-language input fields, consider using `TranslatableType` instead
