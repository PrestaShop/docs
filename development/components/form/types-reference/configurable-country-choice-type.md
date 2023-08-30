---
title: ConfigurableCountryChoiceType
---

# ConfigurableCountryChoiceType

Class responsible for providing configurable countries list

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [ConfigurableCountryChoiceType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/ConfigurableCountryChoiceType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [StateGridDefinitionFactory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Definition/Factory/StateGridDefinitionFactory.php#L210-L218)

```php
$builder->add(
    (new Filter('id_country', ConfigurableCountryChoiceType::class))
        ->setTypeOptions([
            'required' => false,
            'contains_states' => true,
            'choice_translation_domain' => false,
        ])
        ->setAssociatedColumn('country_name')
)
```

## Preview example

{{< figure src="../img/configurable-country-choice.png" title="ConfigurableCountryChoiceType rendered in form example" >}}
