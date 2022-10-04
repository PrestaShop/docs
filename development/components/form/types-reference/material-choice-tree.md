---
title: MaterialChoiceTreeType
---

# MaterialChoiceTreeType

MaterialChoiceTreeType renders checkbox choices using choices tree layout. Requires Javascript component to work as expected.

## Type options

| Option          | Type   | Default value | Description                                                            |
|:----------------|:-------|:--------------|:-----------------------------------------------------------------------|
| choices_tree    | array  | []            | The choices array to select from                                       |
| choice_label    | string | 'name'        | The key in options array to target when getting label for checkbox     |
| choice_value    | string | 'id'          | The key in options array to target when getting value for checkbox     |
| choice_children | string | 'children'    | The key in options array to target when getting the child for checkbox |
| multiple        | bool   | true          | Whether to enable multiple checkboxes selection or no                  |
| disabled_values | array  | []            | Array of ids to disable in choices tree                                |

## Required Javascript components
| Component                                                       | Description                                                                                                          |
|:----------------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------|
| ../admin-dev/themes/new-theme/js/components/form/choice-tree.js | Manages UI interactions: expanding and collapsing tree, auto-checking child checkbox, enabling and disabling inputs. |

## Code example

```php
<?php
// path/to/your/CustomType.php
    
use PrestaShopBundle\Form\Admin\Type\MaterialChoiceTreeType;
use Symfony\Component\Form\AbstractType;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categories', MaterialChoiceTreeType::class, [
                'choices_tree' => [
                    'id' => 1, // choice_value option refers this key
                    'name' => 'Home', //choice_label option refers this key
                    'children' => [ // choice_children refers this key
                        'id' => 2,
                        'name' => 'Example',
                        'children' => [
                            'id' => 3,
                            'name' => 'Example child',
                        ],
                    ],
                ],
            ])
        ;
    }
}
```

Then in Javascript you have to enable `ChoiceTree` component.

```js
import ChoiceTree from 'admin-dev/themes/new-theme/js/components/form/choice-tree';

// initiate the component by providing your tree selector
new ChoiceTree('.js-tree-selector-example');

// you can enable auto checking children elements
ChoiceTree.enableAutoCheckChildren();

// you can also enable or disable all inputs
ChoiceTree.enableAllInputs(); //enable
ChoiceTree.disableAllInputs(); //disable

```

## Preview example

{{< figure src="../img/material_choice_tree.png" title="MaterialChoiceTreeType rendered in form example" >}}
