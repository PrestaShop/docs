---
title: YesAndNoChoiceType
---

# YesAndNoChoiceType

The `YesAndNoChoiceType` represents `select` input with options `Yes` and `No`.

## Type options

| Option   | Type    | Default | Description                           |
| -------- | ------- | ------- | ------------------------------------- |
| choices  | array   | array   | By default Yes/No choices are defined |
| required | boolean | false   | Whether field is required or not      |

## Required Javascript components
    
None.

## Code example

Add `YesAndNoChoiceType` to your form.

```php
<?php

use Symfony\Component\Form\AbstractType;
use PrestaShopBundle\Form\Admin\Type\YesAndNoChoiceType;

class SomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('yesandnochoicetype', YesAndNoChoiceType::class, [
            'choices' => [
                'Yes' => true,
                'No' => false,
            ],
        ]);
    }
}
```

## Preview example

{{< figure src="../img/yes_and_no_choice.png" title="YesAndNoChoiceType rendered in form" >}}
