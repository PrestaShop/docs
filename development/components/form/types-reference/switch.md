---
title: SwitchType
---

# SwitchType

The `SwitchType` displays a switch with Yes/No values.

## Type options

| Option | Type   | Default | Description                      |
| ------ | ------ | ------- | -------------------------------- |
| choices   | array | Choices with Yes/No values  | Choices for switch type |
| disabled   | bool | `false`  | Whether Switch should be disabled or not |

## Required Javascript components
    
None.

## Code example

Add `SwitchType` to your form.

```php
<?php

use Symfony\Component\Form\AbstractType;
use PrestaShopBundle\Form\Admin\Type\SwitchType;

class SomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('switch', SwitchType::class, [
            // Customized choices with ON/OFF instead of Yes/No
            'choices' => [
                'ON' => true,
                'OFF' => false,
            ],
        ]);
    }
}
```

## Preview example

{{< figure src="../img/switch.png" title="SwitchType rendered in form" >}}
