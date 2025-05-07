---
title: DatePickerType
---

# DatePickerType

DatePickerType creates a field with a date picker. It uses Javascript,
but doesn't require any specific components, as it's already enabled globally.

## Type options

| Option  | Type  | Default value                    | Description                                                                                         |    |
|:--------|:------|:---------------------------------|:----------------------------------------------------------------------------------------------------|:---|
| date_format | string | YYYY-MM-DD| Date format. Must be provided in javascript supported type. |    |

## Required Javascript components

None.

## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Type\DatePickerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_from', DatePickerType::class)
            ->add('date_to', DatePickerType::class);
    }
}
```

## Preview example

{{< figure src="../img/date_picker.png" title="DatePickerType rendered in form example" >}}

