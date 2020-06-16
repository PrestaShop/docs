---
title: TranslatableType
---

# TranslatableType

The `TranslatableType` allows you to configure multilanguage input. This multilanguage behavior is provided on top of an existing input Type.

## Type options

| Option  | Type   | Default                                               | Description                              |
| ------- | ------ | ----------------------------------------------------- | ---------------------------------------- |
| type    | string | `Symfony\Component\Form\Extension\Core\Type\TextType` | Type that you want to be translatable    |
| options | array  | Empty array                                           | Options for configured `type`            |
| locales | array  | Enabled shop locales (languages)                      | Locales in which field can be translated |

## Required Javascript components
    
| Component                                                      | Description                                 |
| -------------------------------------------------------------- | ------------------------------------------- |
| admin-dev/themes/new-theme/js/components/translatable-input.js | Allows toggling input for different locales |

## Code example

First, you have to add `TranslatableType` to your form.

```php
<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use PrestaShopBundle\Form\Admin\Type\TranslatableType;

class SomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description', TranslatableType::class, [
            // we'll have text area that is translatable
            'type' => TextareaType::class,
        ]);
    }
}
```

Then in Javascript you have to enable `TranslatableInput` component.

```javascript
    import TranslatableInput from "admin-dev/themes/new-theme/js/components/translatable-input";

    // enable togging of different locales
    new TranslatableInput();
```

## Preview example

{{< figure src="../img/translatable.png" title="TranslatableType rendered in form using textarea" >}}
