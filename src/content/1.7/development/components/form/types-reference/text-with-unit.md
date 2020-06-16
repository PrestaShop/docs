---
title: TextWithUnitType
---

# TextWithUnitType

The `TextWithUnitType` represents text input with unit value (e.g. Kg, Cm & etc.).

## Type options

| Option | Type   | Default | Description                      |
| ------ | ------ | ------- | -------------------------------- |
| unit   | string | `unit`  | Type of unit (e.g. Kg, Cm & etc) |

## Required Javascript components
    
None.

## Code example

Add `TextWithUnitType` to your form and optionally you can configure `unit` for it.

```php
<?php

use Symfony\Component\Form\AbstractType;
use PrestaShopBundle\Form\Admin\Type\TextWithUnitType;

class SomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('weight', TextWithUnitType::class, [
                'unit' => 'kg',
                'required' => false,
                'empty_data' => '0',
            ])
        ;
    }
}
```

## Preview example

{{< figure src="../img/text_with_unit.png" title="TextWithUnitType rendered in form" >}}
