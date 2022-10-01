---
title: GeneratableTextType
---

# GeneratableTextType

Extends TextType with additional button which allows to generate random value for input.

## Type options

| Option                 | Type | Default value | Description                                                                                                            |
|:-----------------------|:-----|:--------------|:-----------------------------------------------------------------------------------------------------------------------|
| generated_value_length | int  | 32            | The length of value to be generated                                                                                 |

## Required Javascript components

| Component                                                             | Description                         |
|:----------------------------------------------------------------------|:------------------------------------|
| ../admin-dev/themes/new-theme/js/components/generatable-input.js | Generates a random value for input. |


## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Type\GeneratableTextType;

class CustomType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('key', GeneratableTextType::class, [
                'generated_value_length' => 16,
            ])
        ;
    }
}
```

Then in Javascript you have to enable `GeneratableInput` component.

```js
import GeneratableInput from "admin-dev/themes/new-theme/js/components/generatable-input";

// initiate the component
const generatableInput = new GeneratableInput();

// attach the component to button which should be targeted to generate random value on click.
generatableInput.attachOn('.js-generator-btn');

// note that the button is required to have 2 data-* attributes to define input target and value length.
// for example:

 *    <button class="js-generator-btn"
 *      data-target-input-id="my-input-id"
 *      data-generated-value-length="16"
 *    > Generate!
 *    </button>
```

## Preview example

{{< figure src="../img/generatable_text.png" title="GeneratableTextType rendered in form example" >}}
