---
title: NumberMinMaxFilterType
---

# NumberMinMaxFilterType {{< minver v="1.7.7.x" title="true" >}}

The `NumberMinMaxFilterType` represents two `NumberType` fields - one holds minimum value of float number type and other holds maximum value.
`NumberType` is one of the native symfony types.

## Type options

| Option   | Type    | Default | Description                           |
| -------- | ------- | ------- | ------------------------------------- |
| min_field_options  | array   | array ( 'attr' => array ( 'placeholder' => $this->trans('Min', [], 'Admin.Global')), )   | Accepts all possible values that `NumberType` has |
| max_field_options | array | array ( 'attr' => array ( 'placeholder' => $this->trans('Max', [], 'Admin.Global')), )   | Accepts all possible values that `NumberType` has      |

## Required Javascript components
    
None.

## Code example

This type is built for grid filters usage but can be used in forms as well.

Add `NumberMinMaxFilterType` to your form.

```php
<?php

use Symfony\Component\Form\AbstractType;
use PrestaShopBundle\Form\Admin\Type\NumberMinMaxFilterType;

class SomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('mumberminmaxtype', NumberMinMaxFilterType::class, [
            'min_field_options' => [
                'attr' => [
                    'placeholder'=> $this->trans('Min', [], 'Admin.Global')
                ]
            ],
            'max_field_options' => [
                'attr' => [
                    'placeholder'=> $this->trans('Max', [], 'Admin.Global')
                ]
            ],
        ]);
    }
}
```

## Preview example

{{< figure src="../img/min_max_inputs.png" title="NumberMinMaxFilterType rendered in grid" >}}
