---
title: ShopChoiceTreeType
---

# ShopChoiceTreeType

The `ShopChoiceTreeType` is subtype of `MaterialChoiceTreeType` which is configured to be used for shop association input.

## Type options

| Option   | Type | Default | Description                                    |
| -------- | ---- | ------- | ---------------------------------------------- |
| multiple | bool | `true`  | Whether multiple shops can be selected or not. |

## Required Javascript components
    
| Component                                                    | Description                        |
| ------------------------------------------------------------ | ---------------------------------- |
| ChoiceTree | Manages interaction of choice tree |

{{% notice note %}}
Learn more about [Javascript components and how to use them]({{<relref "/8/development/components/global-components">}})
{{% /notice %}}

## Code example

Add `ShopChoiceTreeType` to your form.

```php
<?php

use Symfony\Component\Form\AbstractType;
use PrestaShopBundle\Form\Admin\Type\ShopChoiceTreeType;

class SomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('shop_association', ShopChoiceTreeType::class);
    }
}
```

## Preview example

{{< figure src="../img/shop_choice_tree.png" title="ShopChoiceTreeType rendered in form" >}}
