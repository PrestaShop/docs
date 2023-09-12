---
title: TextWithRecommendedLengthType
---

# TextWithRecommendedLengthType

It is used to add a field with a recommended input length counter to the form.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [TextWithRecommendedLengthType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/TextWithRecommendedLengthType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| recommended_length | `int` | 

## Required Javascript components

| Component                                                   | Description                         |
|:------------------------------------------------------------|:------------------------------------|
| TextWithRecommendedLengthCounter  | Adds a recommended length counter to the input |

{{% notice note %}}
Learn more about [Javascript components and how to use them]({{<relref "/8/development/components/global-components">}})
{{% /notice %}}

## Code example

- [CmsPageType](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Form/Admin/Improve/Design/Pages/CmsPageType.php#L150-L177)

```php
$builder->add('meta_description', TranslatableType::class, [
    'label' => $this->trans('Meta description', 'Admin.Global'),
    'type' => TextWithRecommendedLengthType::class,
    'help' => $invalidCharsText,
    'required' => false,
    'options' => [
        'recommended_length' => self::RECOMMENDED_DESCRIPTION_LENGTH,
        'attr' => [
            'maxlength' => self::META_DESCRIPTION_MAX_CHARS,
        ],
        'constraints' => [
            new TypedRegex([
                'type' => 'generic_name',
            ]),
            new Length([
                'max' => self::META_DESCRIPTION_MAX_CHARS,
                'maxMessage' => $this->trans(
                    'This field cannot be longer than %limit% characters',
                    'Admin.Notifications.Error',
                    ['%limit%' => self::META_DESCRIPTION_MAX_CHARS]
                ),
            ]),
        ],
    ],
])
```

## Preview example

{{< figure src="../img/text-with-recommended-length-type.png" title="TextWithRecommendedLengthType rendered in form" >}}

