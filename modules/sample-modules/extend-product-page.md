---
title: Extending the new product page form
weight: 3
---

# Extending the new product page form {{< minver v="8.1.0" >}}

The new Back Office product page introduced in {{< minver v="8.1.0" >}} removed several hooks previously available: 

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

In this guide, we will discover how to extend the product page by adding custom fields, in the old and new way of doing this.

Finally, we will discover how to add a new Tab to the product page. 

## Add a custom field, before {{< minver v="8.1.0" >}}

A custom field, before {{< minver v="8.1.0" >}}, was added by hooking to one of the `displayAdminProducts<location>` hook. 

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

![custom field in SEO tab in older versions of PrestaShop](../img/old-product-form/seo-custom-field.png)

From {{< minver v="8.1.0" >}}, that would produce nothing, since this hook (`displayAdminProductsSeoStepBottom`) is no more used. 

## Add a custom field, from {{< minver v="8.1.0" >}}

To do exactly the same, from {{< minver v="8.1.0" >}}, we will implement `actionProductFormBuilderModifier` hook and modify the Product FormBuilder.

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

`src/Form/Modifier/ProductFormModifier.php`

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
            $seoTabFormBuilder,
            'tags',
            'demo_module_custom_field',
            TextType::class,
            [
                // you can remove the label if you dont need it by passing 'label' => false
                'label' => 'SEO Special Field',
                // customize label by any html attribute
                'label_attr' => [
                    'title' => 'h2',
                    'class' => 'text-info',
                ],
                'attr' => [
                    'placeholder' => 'SEO Special field',
                ],
                // this is just an example, but in real case scenario you could have some data provider class to wrap more complex cases
                'data' => "",
                'empty_data' => '',
                'form_theme' => '@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig',
            ]
        );
    }
}
```

This module is creating a Form Builder Modifier (`ProductFormModifier`), adding a `TextType` field to the `seo` tab form builder from the `ProductForm Builder`, added after the `tags` form element. 

This Form Builder Modifier is hooked to the `actionProductFormBuilderModifier` hook. 

This produces this form: 

![custom field in SEO tab in newer versions of PrestaShop](../img/new-product-form/seo-custom-field.png)

{{% notice note %}}
This new way of adding custom fields to the product page allows you for more precise positioning, you can now position your fields/forms exactly where you want. 
{{% /notice %}}