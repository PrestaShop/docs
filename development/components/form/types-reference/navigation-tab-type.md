---
title: NavigationTabType
---

# NavigationTabType

This form type is used as a container of sub forms, each sub form will be rendered as a part of the navigation tab component. Each first level child is used as a different tab, its label is used for the tab name, and its widget as the tab content.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [NavigationTabType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/NavigationTabType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Usage and description

This form type [was introduced in {{< minver v="8.1.0">}}](https://github.com/PrestaShop/PrestaShop/pull/28752) in the new product page. 

The new product page is based on this form type.

Its usage has been documented in an example module: [`demoproductform`](https://github.com/PrestaShop/example-modules/tree/master/demoproductform).

The module hooks to `actionProductFormBuilderModifier` to modify the `FormBuilder` for the Product page. 
The `ProductFormModifier` adds a new `CustomTabType` (created by the module) to the `FormBuilder` (which is a `NavigationTabType`).

```php
$this->formBuilderModifier->addAfter(
    $productFormBuilder,
    'pricing',
    'custom_tab',
    CustomTabType::class,
    [
        'data' => [
            'custom_price' => $customProduct->custom_price,
        ],
    ]
);
```

This `CustomTabType` contains a simple form type: 

```php
public function buildForm(FormBuilderInterface $builder, array $options)
{
    parent::buildForm($builder, $options);
    $builder
        ->add('custom_price', MoneyType::class, [
            'label' => $this->trans('My custom price', 'Modules.Demoproductform.Admin'),
            'label_tag_name' => 'h3',
            'currency' => $this->defaultCurrency->iso_code,
            'required' => false,
            'constraints' => [
                new NotBlank(),
                new Type(['type' => 'float']),
                new PositiveOrZero(),
            ],
        ])
    ;
}
```

Preview of how it looks in the back office:

{{< figure src="../img/navigation-tab-type.png" title="NavigationTabType" >}}
