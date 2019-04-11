---
title: CategoryChoiceTreeType
menuTitle: CategoryChoiceTreeType
weight: 2
---

### CategoryChoiceTreeType

CategoryChoiceTreeType is a child of [MeterialChoiceTreeType](meterial-choice-tree), it extends parent options
with options listed bellow. It is used to display category tree selection box and requires 
Javascript components.

#### Type fields

| Field                       | Type                                                                                    |
| --------------------------- | ----------------------------------------------------------------------------------------|
| Parent fields               | Parent type [MeterialChoiceTreeType](meterial-choice-tree)                              | 

#### Custom options

| Option                      | Type (default value)                      | Description                                     |
| ----------------------------| ------------------------------------------|-------------------------------------------------|
| **choices_tree**                | **array**(choices list provided by CategoryTreeChoiceProvider.php)| Values to choose from in choices tree |
| **choice_label**                | **string**('name')| An array key which should be targeted in provided choices list to get the label for input|
| **choice_value**                | **string**('id_category')| An array key which should be targeted in provided choices list to get the value for input |


#### Required Javascript components
    
    * ../admin-dev/themes/new-theme/js/components/form/choice-tree.js

#### Example

```php
    // ...
    use PrestaShopBundle\Form\Admin\Type\CategoryChoiceTreeType;
    // ...
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $disabledCategories = [
            $this->getConfiguration()->getInt('PS_ROOT_CATEGORY'),
        ];

        $builder
            ->add('id_parent', CategoryChoiceTreeType::class, [
                'disabled_values' => $disabledCategories,
            ])
        ;
    }    
    // ...
```
