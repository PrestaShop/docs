---
title: DateRangeType
---

# DateRangeType

DateRangeType combines two [DatePickers](../date-picker) to create date range picker. It uses Javascript,
but doesn't require any specific components, as it's already enabled globally.

## Custom options

None.

## Required Javascript components

None.

## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Type\DateRangeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // this will render a date range picker with 2 DatePickerTypes
        // named 'date_add_from' and 'date_add_to'
        $builder->add('date_add', DateRangeType::class);
    }
}
```

## Preview example

{{< figure src="../img/date-range.png" title="DateRangeType rendered in form example" >}}
