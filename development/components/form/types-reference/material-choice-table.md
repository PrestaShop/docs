---
title: MaterialChoiceTableType
---

# MaterialChoiceTableType

MaterialChoiceTableType renders checkbox choices using table layout. It requires Javascript component to work as expected.

## Type options

| Option   | Type | Default value | Description                                            |
|:---------|:-----|:--------------|:-------------------------------------------------------|
| expanded | bool | true          | Whether the table should be expanded by default or not |
| multiple | bool | true          | Whether to enable multiple checkboxes selection or no  |


## Required Javascript components
| Component                                                   | Description                         |
|:------------------------------------------------------------|:------------------------------------|
| ../admin-dev/themes/new-theme/js/components/choice-table.js | Manages selection of all checkboxes |

## Code example

```php
<?php
// path/to/your/CustomType.php
    
use PrestaShopBundle\Form\Admin\Type\MaterialChoiceTableType;
use Symfony\Component\Form\AbstractType;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('group_access', MaterialChoiceTableType::class)
        ;
    }
}
```

Then in Javascript you have to enable `ChoiceTable` component.

```js
import ChoiceTable from 'admin-dev/themes/new-theme/js/components/choice-table';

// initiate the component.
new ChoiceTable();
```

## Preview example

{{< figure src="../img/material_choice_table.png" title="MaterialChoiceTableType rendered in form example" >}}
