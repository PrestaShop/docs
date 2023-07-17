---
title: Modern configuration page
weight: 4
---

# Adding a configuration page with Symfony forms

With the new Symfony architecture, [there is a much modern way of integrating settings forms]({{<relref "/8/development/architecture/migration-guide/forms/settings-forms">}}) (`Configure` action) for your modules. 

In the first part of this guide, we will explain how to implement such a mecanism in a module. We will create a module, with a dedicated configuration page, with a simple configuration field. 

In the second part of this guide, we will list and illustrate the other form types (field types) availables. 

**Summary:** 

{{< toc >}}

## Create the base module

[Following this guide]({{<relref "/8/modules/creation/tutorial">}}), create a base module. For our example, the base module is:

```php
<?php

declare(strict_types=1);

use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

class DemoSymfonyFormSimple extends Module
{
    public function __construct()
    {
        $this->name = 'demosymfonyformsimple';
        $this->author = 'PrestaShop';
        $this->version = '1.1.0';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Demo symfony form configuration', [], 'Modules.DemoSymfonyFormSimple.Admin');
        $this->description = $this->trans(
            'Module created for the purpose of showing existing form types within PrestaShop',
            [],
            'Modules.DemoSymfonyFormSimple.Admin'
        );

        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => '8.99.99'];
    }
}
```

Then, create a `composer.json` file in your module, and register your namespace: 

```json
{
  "name": "prestashop/demosymfonyformsimple",
  "description": "PrestaShop - Settings Form Examples",
  "license": "AFL-3.0",
  "authors": [
    {
      "name": "PrestaShop Core Team"
    }
  ],
  "autoload": {
    "psr-4": {
      "PrestaShop\\Module\\DemoSymfonyFormSimple\\": "src/"
    }
  },
  "require": {
    "php": ">=7.1.0"
  },
  "config": {
    "preferred-install": "dist",
    "prepend-autoloader": false
  },
  "type": "prestashop-module"
}
```

Then, run `composer dump-autoload` from the module's directory to generate the `autoload.php` file. See [Setup composer in a module]({{<relref "/8/modules/concepts/composer#autoloading">}}) for more informations.

## Create the configuration form type

First thing to create is the form type for our configuration form. 

Create a `DemoConfigurationFormType.php` file in `src/Form`.

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoSymfonyFormSimple\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;

class DemoConfigurationFormType extends TranslatorAwareType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('config_text', TextType::class, [
                'label' => $this->trans('Configuration text', 'Modules.DemoSymfonyFormSimple.Admin'),
            ]);
    }
}
```

This form has only one setting : `config_test`, of type `Symfony\Component\Form\Extension\Core\Type\TextType`. 

### Register your newly created form type

Create a `services.yml` file in `config/`. 

```yml
services:
  _defaults:
    public: true

  # Demo configuration text form
  prestashop.module.demosymfonyformsimple.form.type.demo_configuration_text:
    class: 'PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationTextType'
    parent: 'form.type.translatable.aware'
    public: true
    tags:
      - { name: form.type }
```

This `services.yml` file is registering your `PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationTextType` class as `prestashop.module.demosymfonyformsimple.form.type.demo_configuration_text`. It also add a tag `name: form.type`, and declares it as `public`. 

{{% notice note %}}
More informations about services in [Symfony official documentation](https://symfony.com/doc/4.4/service_container.html)
{{% /notice %}}

## Create the Data configuration

Create a `DemoConfigurationTextDataConfiguration.php` file in `src/Form`.

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoSymfonyFormSimple\Form;

use PrestaShop\PrestaShop\Core\Configuration\DataConfigurationInterface;
use PrestaShop\PrestaShop\Core\ConfigurationInterface;

/**
 * Configuration is used to save data to configuration table and retrieve from it
 */
final class DemoConfigurationTextDataConfiguration implements DataConfigurationInterface
{
    public const DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE = 'DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE';

    /**
     * @var ConfigurationInterface
     */
    private $configuration;

    /**
     * @param ConfigurationInterface $configuration
     */
    public function __construct(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfiguration(): array
    {
        $return = [];

        if ($textSimple = $this->configuration->get(static::DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE)) {
            $return['config_text'] = $textSimple;
        }

        return $return;
    }

    /**
     * {@inheritdoc}
     */
    public function updateConfiguration(array $configuration): array
    {
        $this->configuration->set(static::DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE, $configuration['config_text']);
    
        /* Errors are returned here. */
        return [];
    }

    /**
     * Ensure the parameters passed are valid.
     *
     * @param array $configuration
     *
     * @return bool Returns true if no exception are thrown
     */
    public function validateConfiguration(array $configuration): bool
    {
        return true;
    }
}
```

This Data configuration maps the `config_text` from the Form type to the `DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE` configuration data key. 

### Register the Data configuration

In `config/services.yml`, register your newly created `DemoConfigurationTextDataConfiguration`: 

```yml
  prestashop.module.demosymfonyformsimple.form.demo_configuration_text_data_configuration:
    class: PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationTextDataConfiguration
    arguments: ['@prestashop.adapter.legacy.configuration']
```

## Create the form data provider

Create a `DemoConfigurationTextFormDataProvider.php` file in `src/Form`.

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoSymfonyFormSimple\Form;

use PrestaShop\PrestaShop\Core\Configuration\DataConfigurationInterface;
use PrestaShop\PrestaShop\Core\Form\FormDataProviderInterface;

/**
 * Provider ir responsible for providing form data, in this case it's as simple as using configuration to do that
 *
 * Class DemoConfigurationTextFormDataProvider
 */
class DemoConfigurationTextFormDataProvider implements FormDataProviderInterface
{
    /**
     * @var DataConfigurationInterface
     */
    private $demoConfigurationTextDataConfiguration;

    /**
     * @param DataConfigurationInterface $demoConfigurationTextDataConfiguration
     */
    public function __construct(DataConfigurationInterface $demoConfigurationTextDataConfiguration)
    {
        $this->demoConfigurationTextDataConfiguration = $demoConfigurationTextDataConfiguration;
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->demoConfigurationTextDataConfiguration->getConfiguration();
    }

    /**
     * {@inheritdoc}
     */
    public function setData(array $data): array
    {
        return $this->demoConfigurationTextDataConfiguration->updateConfiguration($data);
    }
}
```

### Register the form data provider

In `config/services.yml`, register your newly created `DemoConfigurationTextFormDataProvider`: 

```yml
  prestashop.module.demosymfonyformsimple.form.demo_configuration_text_form_data_provider:
    class: 'PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationTextFormDataProvider'
    arguments:
      - '@prestashop.module.demosymfonyformsimple.form.demo_configuration_text_data_configuration'
```

## Create and register the form handler

For this form handler, we don't need to create a new class, we can use PrestaShop native's one.
Simply register it in `config/services.yml`: 

```yml
  prestashop.module.demosymfonyformsimple.form.demo_configuration_text_form_data_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\Handler'
    arguments:
      - '@form.factory'
      - '@prestashop.core.hook.dispatcher'
      - '@prestashop.module.demosymfonyformsimple.form.demo_configuration_text_form_data_provider'
      - 'PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationTextType'
      - 'DemoConfiguration'
```

## Create the form templates

Create a `form.html.twig` file in `views/templates/admin`. 

```html
{% extends '@PrestaShop/Admin/layout.html.twig' %}

{# PrestaShop made some modifications to the way forms are displayed to work well with PrestaShop in order to benefit from those you need to use ui kit as theme#}
{% form_theme demoConfigurationForm '@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig' %}

{% block content %}
  {{ form_start(demoConfigurationForm) }}
  <div class="card">
    <h3 class="card-header">
      <i class="material-icons">settings</i> {{ 'Text form types'|trans({}, 'Modules.DemoSymfonyFormSimple.Admin') }}
    </h3>
    <div class="card-body">
      <div class="form-wrapper">
        {{ form_widget(demoConfigurationForm) }}
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-end">
        <button class="btn btn-primary float-right" id="save-button">
          {{ 'Save'|trans({}, 'Admin.Actions') }}
        </button>
      </div>
    </div>
  </div>
  {{ form_end(demoConfigurationForm) }}
{% endblock %}
```

## Create the configuration controller

You will create a Controller to handle your requests on the configuration form. 

Create a `DemoConfigurationController.php` file in `src/Controller`. 

```php
<?php

declare(strict_types=1);

namespace PrestaShop\Module\DemoSymfonyFormSimple\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoConfigurationController extends FrameworkBundleAdminController
{
    public function index(Request $request): Response
    {
        $textFormDataHandler = $this->get('prestashop.module.demosymfonyformsimple.form.demo_configuration_text_form_data_handler');

        $textForm = $textFormDataHandler->getForm();
        $textForm->handleRequest($request);

        if ($textForm->isSubmitted() && $textForm->isValid()) {
            /** You can return array of errors in form handler and they can be displayed to user with flashErrors */
            $errors = $textFormDataHandler->save($textForm->getData());

            if (empty($errors)) {
                $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));

                return $this->redirectToRoute('demo_configuration_form');
            }

            $this->flashErrors($errors);
        }

        return $this->render('@Modules/demosymfonyformsimple/views/templates/admin/form.html.twig', [
            'demoConfigurationForm' => $textForm->createView(),
        ]);
    }
}
```

{{% notice note %}}
More informations about controllers on [Controller & routing]({{<relref "/8/development/architecture/modern/controller-routing">}}) and [Symfony official documentation](https://symfony.com/doc/4.4/controller.html)
{{% /notice %}}

### Create a route for the configuration controller

Create a `routes.yml` file in `config/`. 

```yml
demo_configuration_form:
  path: /demosymfonyformsimple/configuration
  methods: [GET, POST]
  defaults:
    _controller: 'PrestaShop\Module\DemoSymfonyFormSimple\Controller\DemoConfigurationController::index'
    # Needed to work with tab system
    _legacy_controller: AdminDemoSymfonyFormSimple
    _legacy_link: AdminDemoSymfonyFormSimple
```

{{% notice note %}}
More informations about routing on [Controller & routing]({{<relref "/8/development/architecture/modern/controller-routing">}}) and [Symfony official documentation](https://symfony.com/doc/4.4/routing.html)
{{% /notice %}}

## Add this route to the getContent() method of the module

The `getContent()` method of a module is the method called when accessing the configuration page of the module. 

Add this method to your module, with a redirection to the route previously registered.

```php
  public function getContent()
  {
      $route = SymfonyContainer::getInstance()->get('router')->generate('demo_configuration_form');
      Tools::redirectAdmin($route);
  }
```

## Install and enable your module

Go to the Back Office, and in Modules, find your module, then install and enable it. 

{{% notice note %}}
You can also install it via CLI: 

```
php bin/console prestashop:module install demosymfonyformsimple
php bin/console prestashop:module enable demosymfonyformsimple
```
{{% /notice %}}

## Navigate / test your configuration form

Open your browser, and navigate to `Back Office > Modules`.

Then, find your module (`Demo symfony form configuration`), and click on the `Configure` button. 

## Complete example module

The module created in this guide is available [here](https://github.com/PrestaShop/example-modules/tree/master/demosymfonyformsimple).

## Other form types

You can use all [native Symfony Form Types](https://symfony.com/doc/4.4/reference/forms/types.html), and the PrestaShop specific ones: 

| Form type name | Namespace | Description |
| --- | --- | --- |
| `AccordionType` | PrestaShopBundle\Form\Admin\Type | This form type is used as a container of sub forms, each sub form will be rendered as a part of an accordion. |
| `AmountCurrencyType` | PrestaShopBundle\Form\Admin\Type | Amount with currency: combination of a `NumberType` input and a `ChoiceType` input (for currency selection). |
| `ButtonCollectionType` | PrestaShopBundle\Form\Admin\Type | `ButtonCollectionType` is a form type used to group buttons in a common form group which is useful for forms which have multiple submit buttons. |
| `CategoryChoiceTreeType` | PrestaShopBundle\Form\Admin\Type | A `MaterialChoiceTreeType` for categories |
| `ChangePasswordType` | PrestaShopBundle\Form\Admin\Type | `ChangePasswordType` is responsible for defining "change password" form type. |
| `ChoiceCategoriesTreeType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a category selector using Nested sets |
| `ColorPickerType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a color picker field |
| `ConfigurableCountryChoiceType` | PrestaShopBundle\Form\Admin\Type | Class responsible for providing configurable countries list |
| `CountryChoiceType` | PrestaShopBundle\Form\Admin\Type | CountryChoiceType is responsible for providing country choices with -- symbol in front of array. |
| `CustomContentType` | PrestaShopBundle\Form\Admin\Type | Type is used to add any content in any position of the form rather than actual field. |
| `CustomMoneyType` | PrestaShopBundle\Form\Admin\Type | Native Symfony `MoneyType` customised for PrestaShop |
| `DatePickerType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a date picker field |
| `DateRangeType` | PrestaShopBundle\Form\Admin\Type | Combination of two `DatePickerType` fields to create a range of dates. Optional `CheckboxType` to allow unlimited "to" dates. |
| `DeltaQuantityType` | PrestaShopBundle\Form\Admin\Type | Quantity field that displays the initial quantity (not editable) and allows editing with delta quantity instead (ex: +5, -8). The input data of this form type is the initial (as a plain integer) however its output on submit is the delta quantity. |
| `EmailType` | PrestaShopBundle\Form\Admin\Type | Symfony native `EmailType` extended with IDNConverter (InternationalizedDomainNameConverter) feature |
| `EntityItemType` | PrestaShopBundle\Form\Admin\Type | Default entry type used by EntitySearchInputType |
| `EntitySearchInputType` | PrestaShopBundle\Form\Admin\Type | This form type is used for a OneToMany (or ManyToMany) association, it allows to search a list of entities (based on a remote url) and associate it. It is based on the CollectionType form type which provides prototype features to display a custom template for each associated items. |
| `FormattedTextareaType` | PrestaShopBundle\Form\Admin\Type | Class enabling TinyMCE on a Textarea field |
| `GeneratableTextType` | PrestaShopBundle\Form\Admin\Type | It is extension of TextType that adds additonal button which allows generating value for input |
| `IconButtonType` | PrestaShopBundle\Form\Admin\Type | A form button with material icon. |
| `ImagePreviewType` | PrestaShopBundle\Form\Admin\Type | This form type is used to display an image value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or be used just to display an image in a form. |
| `IntegerMinMaxFilterType` | PrestaShopBundle\Form\Admin\Type | Defines the integer type two inputs of min and max value - designed to fit grid in grid filter. |
| `IpAddressType` | PrestaShopBundle\Form\Admin\Type | Extended input type for IP addresses. Displays a bouton to add the user's one to the list. |
| `LogSeverityChoiceType` | PrestaShopBundle\Form\Admin\Type | `ChoiceType` of `PrestaShopLogger` Log levels |
| `MoneyWithSuffixType` | PrestaShopBundle\Form\Admin\Type | Class `MoneyWithSuffixType` is a Symfony `MoneyType`, which also has a suffix string right after the currency sign. |
| `NavigationTabType` | PrestaShopBundle\Form\Admin\Type | This form type is used as a container of sub forms, each sub form will be rendered as a part of navigation tab component. Each first level child is used as a different tab, its label is used for the tab name and it's widget as the tab content. |
| `NumberMinMaxFilterType` | PrestaShopBundle\Form\Admin\Type | Defines the number type two inputs of min and max value - designed to fit grid in grid filter. |
| `PriceReductionType` | PrestaShopBundle\Form\Admin\Type | Responsible for creating form for price reduction |
| `RadioWithChoiceChildrenType` | PrestaShopBundle\Form\Admin\Type | Combination of a `RadioType` and a `ChoiceType` fields |
| `ResizableTextType` | PrestaShopBundle\Form\Admin\Type | ResizableTextType adds new sizing options to TextType. |
| `SearchAndResetType` | PrestaShopBundle\Form\Admin\Type | FormType used in rendering of "Search and Reset" action in Grids. |
| `ShopChoiceTreeType` | PrestaShopBundle\Form\Admin\Type | `MaterialChoiceTreeType` customized with shop names |
| `ShopRestrictionCheckboxType` | PrestaShopBundle\Form\Admin\Type | This class displays customized checkbox which is used for shop restriction functionality. |
| `SubmittableDeltaQuantityType` | PrestaShopBundle\Form\Admin\Type | Wraps SubmittableInput and DeltaQuantity components to work together. |
| `SubmittableInputType` | PrestaShopBundle\Form\Admin\Type | Adds a button right into specified input and toggles it's availability on change |
| `SwitchType` | PrestaShopBundle\Form\Admin\Type | Displays a switch (ON / OFF by default). |
| `TextPreviewType` | PrestaShopBundle\Form\Admin\Type | This form type is used to display a text value without providing an interactive input to edit it. It is based on a hidden input so it could be changed programmatically, or be used just to display a data in a form. |
| `TextWithLengthCounterType` | PrestaShopBundle\Form\Admin\Type | Defines reusable text input with max length counter |
| `TextWithRecommendedLengthType` | PrestaShopBundle\Form\Admin\Type | Is used to add field with recommended input length counter to the form. |
| `TranslatableChoiceType` | PrestaShopBundle\Form\Admin\Type | Class TranslatableChoiceType adds translatable choice types with custom inner type to forms. Language selection uses a dropdown. |
| `TranslatableType` | PrestaShopBundle\Form\Admin\Type | Class TranslatableType adds translatable inputs with custom inner type to forms. Language selection uses a dropdown. |
| `TranslateType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a translatable form. Language selection uses tabs. |
| `TypeaheadCustomerCollectionType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a customer. |
| `TypeaheadProductCollectionType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a product, with or without attribute field. |
| `TypeaheadProductPackCollectionType` | PrestaShopBundle\Form\Admin\Type | This form class is responsible to create a product, with or without attribute field. |
| `UnavailableType` | PrestaShopBundle\Form\Admin\Type | This form type is useful during development phase to show part of a form that are not available yet. |
| `YesAndNoChoiceType` | PrestaShopBundle\Form\Admin\Type | Symfony `ChoiceType` with `Yes` and `No` choices. |
| `ZoneChoiceType` | PrestaShopBundle\Form\Admin\Type | Class is responsible for providing configurable zone choices with -- symbol in front of array |
| `ProfileChoiceType` | PrestaShopBundle\Form\Admin\Type\Common\Team | Class ProfileChoiceType is choice type for selecting employee's profile. |
| `MaterialChoiceTableType` | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialChoiceTableType renders checkbox choices using table layout. |
| `MaterialChoiceTreeType` | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialChoiceTreeType renders trees using table layout. |
| `MaterialMultipleChoiceTableType` | PrestaShopBundle\Form\Admin\Type\Material | Class MaterialMultipleChoiceTableType renders multiple checkbox choices using table layout. |

{{% notice note %}}
Please refer to this example module for a complete implementation of those fields: [DemoSymfonyForm](https://github.com/PrestaShop/example-modules/tree/master/demosymfonyform)
{{% /notice %}}

### Required Javascript for some types

Some types requires Javascript initializations to properly work. 

Add a JS file to your form's twig template: 

```html
{% block javascripts %}
  {{ parent() }}
  <script src="{{ asset('../modules/demosymfonyform/views/js/form.js') }}"></script>
{% endblock %}
```

And add the Javascript code to this JS file:

```js
$(document).ready(function () {
    // Learn more about components in documentation
    // https://devdocs.prestashop.com/8/development/components/global-components/
    window.prestashop.component.initComponents(
        [
            'TranslatableField',
            'TinyMCEEditor',
            'TranslatableInput',
            'GeneratableInput',
            'TextWithLengthCounter',
        ],
    );

    window.prestashop.instance.generatableInput.attachOn('.js-generator-btn');
    new window.prestashop.component.ChoiceTree('#form_category_choice_tree_type');
});
```

{{% notice note %}}
Please refer to this example module for a complete implementation of those fields with Javascript: [DemoSymfonyForm](https://github.com/PrestaShop/example-modules/tree/master/demosymfonyform)
{{% /notice %}}
