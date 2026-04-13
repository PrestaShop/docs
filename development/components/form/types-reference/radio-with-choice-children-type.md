---
title: RadioWithChoiceChildrenType
---

# RadioWithChoiceChildrenType

Combination of a RadioType and a ChoiceType fields

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [RadioWithChoiceChildrenType](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Form/Admin/Type/RadioWithChoiceChildrenType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| radio_name | `string` | | Name of the radio input |
| radio_label | `string` | | Label of the radio input |
| child_choice | `array` | | Choices available in the ChoiceType |

## Code example

- [ExportCataloguesType](https://github.com/PrestaShop/PrestaShop/blob/9.1.0/src/PrestaShopBundle/Form/Admin/Improve/International/Translations/ExportCataloguesType.php#L77-L89)

```php
$builder->add('themes_selectors', RadioWithChoiceChildrenType::class, [
    'radio_name' => 'themes_type',
    'radio_label' => $this->trans('Theme translations', 'Admin.International.Feature'),
    'required' => false,
    'label' => null,
    'child_choice' => [
        'name' => 'selected_value',
        'empty' => $this->trans('Select a theme', 'Admin.International.Feature'),
        'choices' => $this->excludeCoreThemesFromChoices($this->themeChoices),
        'label' => false,
        'multiple' => false,
    ],
]);
```

## Preview example

{{< figure src="../img/radio-with-choice-children-type.png" title="RadioWithChoiceChildrenType rendered in form example" >}}
