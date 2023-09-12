---
title: CategoryChoiceTreeType
---

# CategoryChoiceTreeType

CategoryChoiceTreeType is a child of [MaterialChoiceTreeType](../material-choice-tree), it extends parent options
with options listed bellow. It is used to display category tree selection box and requires 
Javascript components.

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| choices_tree | array  | Array of all available categories | Values to choose from in choices tree                                                     |
| choice_label | string | `name`                            | An array key which should be targeted in provided choices list to get the label for input |
| choice_value | string | `id_category`                     | An array key which should be targeted in provided choices list to get the value for input |

## Required Javascript components

| Component                                                       | Description                                                        |
| :-------------------------------------------------------------- | :----------------------------------------------------------------- |
| ChoiceTree | Responsible for choice tree expanding and collapsing interactivity |

{{% notice note %}}
Learn more about [Javascript components and how to use them]({{<relref "/8/development/components/global-components">}})
{{% /notice %}}

## Code example

```php
<?php
// path/to/your/CustomType.php

use PrestaShopBundle\Form\Admin\Type\CategoryChoiceTreeType;
use Symfony\Component\Form\AbstractType;

class CustomType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
        // you can disable some categories selection in choice tree
        $disabledCategories = [
            2, // category id
        ];
        $builder
            ->add('category_id', CategoryChoiceTreeType::class, [
                'disabled_values' => $disabledCategories,
            ])
        ;
    }    
}
```

## Preview example

{{< figure src="../img/category_choice_tree.png" title="CategoryChoiceTree rendered in form example" >}}
