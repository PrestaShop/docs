---
title: MaterialMultipleChoiceTableType
---

## MaterialMultipleChoiceTableType

MaterialMultipleChoiceTableType renders checkbox choices using choices table layout. It is similar to [MaterialChoiceTableType]({{< ref "material-choice-table" >}}),
but it allows using multiple checkboxes per row. Requires Javascript component to work as expected.

## Type options

| Option             | Type  | Default value | Description                                                                                                                                                                                                                                                |
|:-------------------|:------|:--------------|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| multiple_choices   | array | none          | Each item of array should contain a `name` which represents column header and `valid options` for [ChoiceType](https://symfony.com/doc/4.4/reference/forms/types/choice.html) including the 'choices' array which values are rendered as column selections |
| choices            | array | none          | The 'choices' array for [ChoiceType](https://symfony.com/doc/4.4/reference/forms/types/choice.html). These values represents the first column of the table.                                                                                                |
| scrollable         | bool  | true          | Whether to make table scrollable or not                                                                                                                                                                                                                    |
| headers_to_disable | array | []            | Array of header names to be disabled if needed |
| headers_fixed      | bool  | true          | Whether to make table header fixed or not on scroll |
| table_label      | bool & array  | false          | Set table label |


## Required Javascript components
| Component                                                            | Description                         |
|:---------------------------------------------------------------------|:------------------------------------|
| ../admin-dev/themes/new-theme/js/components/multiple-choice-table.js | Manages selection of all checkboxes |

## Code example

```php
<?php
// path/to/your/CustomType.php
    
use PrestaShopBundle\Form\Admin\Type\MaterialMultipleChoiceTableType;
use Symfony\Component\Form\AbstractType;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('group_restrictions', MaterialMultipleChoiceTableType::class, [
                'label' => 'Group restrictions',
                'choices' => [ //these choices are rendered as the first column of the table that represents a row name
                    'Visitor' => 1,
                    'Guest' => 2,
                    'Customer' => 3,
                ],
                'multiple_choices' => [
                    //This will be rendered as a first selections column
                    [
                        'name' => 'bank_transfer',
                        'label' => 'Bank transfer',
                        'multiple' => true,
                        'choices' => [ //choice list of this column
                            'Visitor' => 1,
                            'Guest' => 2,
                            'Customer' => 3,
                        ],
                    ],
                    //This will be rendered as second selections column
                    [
                        'name' => 'check_payment',
                        'label' => 'Payments by check',
                        'multiple' => true,
                        'choices' => [ //choice list of this column
                            'Visitor' => 1,
                            'Guest' => 2,
                            'Customer' => 3,
                        ],
                    ]
                ],
            ])
        ;
    }
}
```

Then in Javascript you have to enable `MultipleChoiceTable` component.

```js
import MultipleChoiceTable from 'admin-dev/themes/new-theme/js/components/multiple-choice-table';

// enable the component
new MultipleChoiceTable();
```

## Preview example

{{< figure src="../img/material_multiple_choice_table.png" title="MaterialMultipleChoiceTableType rendered in form example" >}}
