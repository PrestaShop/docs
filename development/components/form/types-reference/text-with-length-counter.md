---
title: TextWithLengthCounterType
---

# TextWithLengthCounterType

The `TextWithLengthCounterType` represents text input with value length counter.

## Type options

| Option     | Type   | Default                  | Description                                                                  |
| ---------- | ------ | ------------------------ | ---------------------------------------------------------------------------- |
| max_length | int    | None, must be configured | Max length of input value                                                    |
| position   | string | `before`                 | Configures position for counter. Available options are: `before` and `after` |
| input      | string | `text`                   | Configured input type `text` or `textarea`                                   |

## Required Javascript components
    
| Component                                                                 | Description                           |
| ------------------------------------------------------------------------- | ------------------------------------- |
| admin-dev/themes/new-theme/js/components/form/text-with-length-counter.js | Calculates remaining length for input |

## Code example

First, you have to add `TextWithLengthCounterType` to your form.

```php
<?php

use Symfony\Component\Form\AbstractType;
use PrestaShopBundle\Form\Admin\Type\TextWithLengthCounterType;

class SomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('meta_title', TextWithLengthCounterType::class, [
            'max_length' => 255,
        ]);
    }
}
```

Then in Javascript you have to enable `TextWithLengthCounter` component.

```js
    import TextWithLengthCounter from "admin-dev/themes/new-theme/js/components/form/text-with-length-counter";

    // enables length counter for all TextWithLengthCounterType inputs on the page
    new TextWithLengthCounter();
```

## Preview example

{{< figure src="../img/text_with_length_counter.png" title="TextWithLengthCounterType rendered in form" >}}
