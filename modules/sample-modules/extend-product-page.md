---
title: Extending the new product page form
weight: 3
---

# Extending the new product page form {{< minver v="8.1.0" >}}

The new Back Office product page introduced in {{< minver v="8.1.0" >}} removed several hooks which were previously available on the page. Complete list of removed hooks:

- `displayAdminProductsCombinationBottom`
- `displayAdminProductsSeoStepBottom`
- `displayAdminProductsShippingStepBottom`
- `displayAdminProductsQuantitiesStepBottom`
- `displayAdminProductsMainStepLeftColumnBottom`
- `displayAdminProductsMainStepLeftColumnMiddle`
- `displayAdminProductsMainStepRightColumnBottom`
- `displayAdminProductsOptionsStepTop`
- `displayAdminProductsOptionsStepBottom`
- `displayAdminProductsPriceStepBottom`

The only `displayAdminProduct*` hook that was not removed is: 

- `displayAdminProductsExtra`

{{% notice info %}}
Although kept for backward compatibility, this hook (`displayAdminProductsExtra`) is not recommended for new modules.
{{% /notice %}}

In this guide, we will discover how to extend the product page by adding custom fields, in the old and new ways of doing this.

Finally, we will discover how to add a new tab to the product page, which is possible for a new product page from PrestaShop 8.1. 

## Add a custom field, before {{< minver v="8.1.0" >}}

A custom field, before {{< minver v="8.1.0" >}}, was added by hooking to one of the `displayAdminProducts<Location>` hooks. 

For example, to add a custom field, in the `SEO` tab, you had to create a module with this content: 

`demooldhooks.php`: 

```php
declare(strict_types=1);

use Symfony\Component\Form\Extension\Core\Type\TextType;

class DemoOldHooks extends Module
{
  public function __construct()
  {
    // [...]
  }

  /**
   * @return bool
   */
  public function install()
  {
      return parent::install() && $this->registerHook(['displayAdminProductsSeoStepBottom']);
  }

  public function hookDisplayAdminProductsSeoStepBottom($params)
  {
    $productId = $params['id_product'];
    $formFactory = $this->get('form.factory');
    $twig = $this->get('twig');

    $product = new Product($productId);

    $form = $formFactory
      ->createNamedBuilder('seo_special_field', TextType::class, "")
      ->getForm();

    $template = '@Modules/demooldhooks/views/templates/seo_special_field.html.twig';

    return $twig->render($template, [
      'seo_special_field' => $form->createView()
    ]);
  }
}
```

`views/templates/seo_special_field.html.twig`: 

```php
<h3>SEO Special field</h3>
{{ form_widget(seo_special_field) }}
```

Before {{< minver v="8.1.0" >}}, that would produce: 

![Custom field in SEO tab in older versions of PrestaShop](../img/old-product-form/seo-custom-field.png)

From {{< minver v="8.1.0" >}}, this field won't be displayed as a hook (`displayAdminProductsSeoStepBottom`) is no longer available.

## Add a custom field, from {{< minver v="8.1.0" >}}

To do exactly the same, from {{< minver v="8.1.0" >}}, we will implement `actionProductFormBuilderModifier` hook and modify product's FormBuilder.

First, create a module, with a `composer.json` file, [as instructed here]({{< relref "/8/modules/concepts/composer" >}}).

`demonewhooks.php`: 

```php
declare(strict_types=1);

use DemoNewHooks\Form\Modifier\ProductFormModifier;

class DemoNewHooks extends Module
{
    public function __construct()
    {
        // [...]
    }

    /**
     * @return bool
     */
    public function install()
    {
        return parent::install() && $this->registerHook(['actionProductFormBuilderModifier']);
    }
    
    /**
     * Modify product form builder
     *
     * @param array $params
     */
    public function hookActionProductFormBuilderModifier(array $params): void
    {
        /** @var ProductFormModifier $productFormModifier */
        $productFormModifier = $this->get(ProductFormModifier::class);
        $productId = (int) $params['id'];

        $productFormModifier->modify($productId, $params['form_builder']);
    }
}
```

`config/services.yml`: 

```yml
services:
    DemoNewHooks\Form\Modifier\ProductFormModifier:
        autowire: true
        public: true
        arguments:
            $formBuilderModifier: '@form.form_builder_modifier'
```

`src/Form/Modifier/ProductFormModifier.php`:

```php
declare(strict_types=1);

namespace DemoNewHooks\Form\Modifier;

use PrestaShopBundle\Form\FormBuilderModifier;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductFormModifier
{
    /**
     * @var FormBuilderModifier
     */
    private $formBuilderModifier;

    /**
     * @param FormBuilderModifier $formBuilderModifier
     */
    public function __construct(
        FormBuilderModifier $formBuilderModifier
    ) {
        $this->formBuilderModifier = $formBuilderModifier;
    }

    /**
     * @param int|null $productId
     * @param FormBuilderInterface $productFormBuilder
     */
    public function modify(
        int $productId,
        FormBuilderInterface $productFormBuilder
    ): void {
     
        $seoTabFormBuilder = $productFormBuilder->get('seo');
        $this->formBuilderModifier->addAfter(
            $seoTabFormBuilder, // the tab
            'tags', // the input/form from which to insert after/before
            'demo_module_custom_field', // your field name
            TextType::class, // your field type
            [
                'label' => 'SEO Special Field', // you can remove the label if you dont need it by passing 'label' => false
                'label_attr' => [ // customize label with any HTML attribute
                    'title' => 'h2',
                    'class' => 'text-info',
                ],
                'attr' => [
                    'placeholder' => 'SEO Special field',
                ],
                // this is just an example, but in real case scenario, you could have some data provider class to handle more complex cases
                'data' => "",
                'empty_data' => '',
                'form_theme' => '@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig',
            ]
        );
    }
}
```

This module uses a Form Builder Modifier (`FormBuilderModifier`), and adds a `TextType` field to the `SEO` tab form,  after the existing `tags` form element. 

`FormBuilderModifier` is hooked to the `actionProductFormBuilderModifier`. 

These changes produces the below's:

![Custom field in SEO tab in newer versions of PrestaShop](../img/new-product-form/seo-custom-field.png)

{{% notice note %}}
This new way of adding custom fields to the product page allows you for more precise positioning. You can now position your fields/forms exactly where you want. 
{{% /notice %}}

## Cheatsheet for old/new hooks / new hooks

### Hook: actionProductFormBuilderModifier

- Hook : [`action<Object>FormBuilderModifier`]({{< relref "/8/modules/concepts/hooks/list-of-hooks/action<FormName>FormBuilderModifier" >}})

| Old hook | Location on page | Form tab | Inserted |
| --- | --- | --- | --- |
| `displayAdminProductsSeoStepBottom` | Bottom of SEO tab | `seo` | after `tags` |
| `displayAdminProductsCombinationBottom` | Bottom of Combinations tab | `combinations` | after `availability` |
| `displayAdminProductsShippingStepBottom` | Bottom of Shipping tab | `shipping` | after `carriers` |
| `displayAdminProductsQuantitiesStepBottom` | Bottom of Quantities tab | `stock` | after `low_stock_threshold` |
| `displayAdminProductsMainStepLeftColumnBottom` | Basic settings tab, under related product | `description` | after `related_products` |
| `displayAdminProductsMainStepLeftColumnMiddle` | Basic settings tab, under description | `description` | after `description` |
| `displayAdminProductsMainStepRightColumnBottom` | Basic settings tab, under create a category | `description` | after `categories` |
| `displayAdminProductsOptionsStepTop` | Top of Options tab | `options` | before `visibility` |
| `displayAdminProductsOptionsStepBottom` | Bottom of Options tab | `options` | after `product_suppliers` |
| `displayAdminProductsPriceStepBottom` | Bottom of Pricing tab | `pricing` | after `priority_management` |

Form Type details: [`EditProductFormType`](https://github.com/PrestaShop/PrestaShop/blob/8.1.0-beta.1/src/PrestaShopBundle/Form/Admin/Sell/Product/EditProductFormType.php)

## Extend a subform

Subforms can be extended as well, for example, to add a new input on each combination of a product: 

- Hook to actionProductCombinationFormBuilderModifier ([`action<Object>FormBuilderModifier`]({{< relref "/8/modules/concepts/hooks/list-of-hooks/action<FormName>FormBuilderModifier" >}}))

```php
/**
 * Hook that modifies the combination form structure.
 *
 * @param array $params
 */
public function hookActionCombinationFormFormBuilderModifier(array $params): void
{
    /** @var CombinationFormModifier $productFormModifier */
    $productFormModifier = $this->get(CombinationFormModifier::class);
    $combinationId = isset($params['id']) ? new CombinationId((int) $params['id']) : null;

    $productFormModifier->modify($combinationId, $params['form_builder']);
}
```

`src/Form/Modifier/CombinationFormModifier.php`:

```php
// [...]
class CombinationFormModifier
{
    // [...]

    /**
     * @param CombinationId|null $combinationId
     * @param FormBuilderInterface $combinationFormBuilder
     */
    public function modify(
        ?CombinationId $combinationId,
        FormBuilderInterface $combinationFormBuilder
    ): void {
        $idValue = $combinationId ? $combinationId->getValue() : null;
        $customCombination = new CustomCombination($idValue);
        $this->addCustomField($customCombination, $combinationFormBuilder);
    }

    /**
     * @param CustomCombination $customCombination
     * @param FormBuilderInterface $combinationFormBuilder
     *
     * @see demoproductform::hook
     */
    private function addCustomField(CustomCombination $customCombination, FormBuilderInterface $combinationFormBuilder): void
    {
        $this->formBuilderModifier->addAfter(
            $combinationFormBuilder,
            'references',
            'demo_module_custom_field',
            TextType::class,
            [
                'label' => $this->translator->trans('Demo custom field', [], 'Modules.Demoproductform.Admin'),
                'label_attr' => [
                    'title' => 'h2',
                    'class' => 'text-info',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Your example text here', [], 'Modules.Demoproductform.Admin'),
                ],
                'data' => $customCombination->custom_field,
                'empty_data' => '',
                'form_theme' => '@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig',
            ]
        );
    }
}
```

This example will add a `TextType` input on each `Combination` of a `Product`. 
A complete working example and implementation is available in our [example-module repository](https://github.com/PrestaShop/example-modules/tree/master/demoproductform).

## Add a custom tab to the product page

{{< minver v="8.1.0" >}} introduced a new feature: custom tabs on the product page. 

A complete working example of implementation is available in our [example-module repository](https://github.com/PrestaShop/example-modules/tree/master/demoproductform).

- You can extend the product form builder with `actionProductFormBuilderModifier` hook with a created modifier: 

`demonewhooks.php`: 

```php
declare(strict_types=1);

use DemoNewHooks\Form\Modifier\ProductFormModifier;

class DemoNewHooks extends Module
{
    public function __construct()
    {
        // [...]
    }

    /**
     * @return bool
     */
    public function install()
    {
        return parent::install() && $this->registerHook(['actionProductFormBuilderModifier']);
    }
    
    /**
     * Modify product form builder
     *
     * @param array $params
     */
    public function hookActionProductFormBuilderModifier(array $params): void
    {
        /** @var ProductFormModifier $productFormModifier */
        $productFormModifier = $this->get(ProductFormModifier::class);
        $productId = (int) $params['id'];

        $productFormModifier->modify($productId, $params['form_builder']);
    }
}
```

`config/services.yml`: 

```yml
services:
    DemoNewHooks\Form\Modifier\ProductFormModifier:
        autowire: true
        public: true
        arguments:
            $formBuilderModifier: '@form.form_builder_modifier'
```

`src/Form/Modifier/ProductFormModifier.php`:

```php
declare(strict_types=1);

namespace DemoNewHooks\Form\Modifier;

use PrestaShopBundle\Form\FormBuilderModifier;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductFormModifier
{
    /**
     * @var FormBuilderModifier
     */
    private $formBuilderModifier;

    /**
     * @param FormBuilderModifier $formBuilderModifier
     */
    public function __construct(
        FormBuilderModifier $formBuilderModifier
    ) {
        $this->formBuilderModifier = $formBuilderModifier;
    }

    /**
     * @param int|null $productId
     * @param FormBuilderInterface $productFormBuilder
     */
    public function modify(
        int $productId,
        FormBuilderInterface $productFormBuilder
    ): void {
        
    }
}
```

- Create a new Type for your custom tab, for example `CustomTabType`, and add a `MoneyType` input in this tab: 

`src/Form/Type/CustomTabType.php`:

```php
declare(strict_types=1);

namespace PrestaShop\Module\DemoProductForm\Form\Type;

use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Validator\Constraints\Type;

class CustomTabType extends TranslatorAwareType
{
    /**
     * @var \Currency
     */
    private $defaultCurrency;

    /**
     * @param TranslatorInterface $translator
     * @param array $locales
     * @param \Currency $defaultCurrency
     */
    public function __construct(
        TranslatorInterface $translator,
        array $locales,
        \Currency $defaultCurrency
    ) {
        parent::__construct($translator, $locales);
        $this->defaultCurrency = $defaultCurrency;
    }

    /**
     * {@inheritDoc}
     */
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

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefaults([
                'label' => $this->trans('Customization', 'Modules.Demoproductform.Admin'),
            ])
        ;
    }
}
```

Declare your service in your `config.yml`:

```yml
services:
    DemoNewHooks\Form\Type\CustomTabType:
        class: DemoNewHooks\Form\Type\CustomTabType
        parent: 'form.type.translatable.aware'
        public: true
        arguments:
            - '@=service("prestashop.adapter.data_provider.currency").getDefaultCurrency()'
        tags:
            - { name: form.type }
```

Add a `use` statement in your `ProductFormModifier`: 

```php
use DemoNewHooks\Form\Type\CustomTabType;
```

Finally, add this `CustomTabType` to the `$productFormBuilder` variable in your `modify` method in the `ProductFormModifier`: 

```php
/**
 * @param int|null $productId
 * @param FormBuilderInterface $productFormBuilder
 */
public function modify(
    int $productId,
    FormBuilderInterface $productFormBuilder
): void {
    
    $idValue = $productId ? $productId->getValue() : null;
    $customProduct = new CustomProduct($idValue);

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
}
```

{{% notice note %}}
Any type added directly to the `$productFormBuilder` (and not to a sub-tab) will be considered as a tab.
{{% /notice %}}

## Backwards compatibility for displayAdminProductsExtra hook

A custom Form Type `ExtraModulesType` has been added to {{< minver v="8.1.0" >}}, to allow backward compatibility for modules implementing `displayAdminProductsExtra` hook.

If a module registers to `displayAdminProductsExtra` hook, a custom tab will be added on the new product page, handled by `ExtraModulesType`. 

{{% notice info %}}
Although kept for backward compatibility, this hook (`displayAdminProductsExtra`) is not recommended for new modules.
{{% /notice %}}

```php
public function hookDisplayAdminProductsExtra(array $params): string
{
    $productId = $params['id_product'];
    $customProduct = new CustomProduct($productId);

    /** @var EngineInterface $twig */
    $twig = $this->get('twig');

    return $twig->render('@Modules/demoproductform/views/templates/admin/extra_module.html.twig', [
        'customProduct' => $customProduct,
    ]);
}
```

A complete working example and implementation is available in our [example-module repository](https://github.com/PrestaShop/example-modules/tree/master/demoproductform).

## Handle data modified by FormBuilderModifier

You need to implement the corresponding [`actionAfterCreate<FormName>FormHandler`]({{< relref "/8/modules/concepts/hooks/list-of-hooks/actionAfterCreate<FormName>FormHandler" >}}) or [`actionAfterUpdate<FormName>FormHandler`]({{< relref "/8/modules/concepts/hooks/list-of-hooks/actionAfterUpdate<FormName>FormHandler" >}}) hook, as shown in our [example-module repository](https://github.com/PrestaShop/example-modules/tree/master/demoproductform).
