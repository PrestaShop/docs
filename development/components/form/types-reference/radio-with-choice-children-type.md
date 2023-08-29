---
title: RadioWithChoiceChildrenType
---

# RadioWithChoiceChildrenType

Combination of a RadioType and a ChoiceType fields

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [RadioWithChoiceChildrenType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/RadioWithChoiceChildrenType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [ExportCataloguesType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Improve/International/Translations/ExportCataloguesType.php#L106-L118)

```php
$builder->add('themes_selectors', RadioWithChoiceChildrenType::class, [
    'radio_name' => 'themes_type',
    'radio_label' => $this->trans('Theme translations', 'Admin.International.Feature'),
    'required' => false,
    'label' => null,
    'child_choice' => [
        'name' => 'selected_value',
        'empty' => $this->trans('Select a theme', 'Admin.International.Feature'),
        'choices' => $this->excludeDefaultThemeFromChoices($this->themeChoices),
        'label' => false,
        'multiple' => false,
    ],
]);
```

## Preview example

