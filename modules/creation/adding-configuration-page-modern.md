---
title: Modern configuration page
weight: 4
---

# Adding a configuration page with Symfony forms

With the new Symfony architecture, [there is a much modern way of integrating settings forms]({{<relref "/8/development/architecture/migration-guide/forms/settings-forms">}}) (`Configure` action) for your modules. 

In the first part of this guide, we will explain how to implement such a mechanism in a module. We will create a module with a dedicated configuration page consisting of a simple configuration field. 


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
        $this->version = '1.0.0';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Demo of the Symfony-based configuration form', [], 'Modules.Demosymfonyformsimple.Admin');
        $this->description = $this->trans(
            'Module demonstrates a simple module\'s configuration page made with Symfony.',
            [],
            'Modules.Demosymfonyformsimple.Admin'
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

use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class DemoConfigurationFormType extends TranslatorAwareType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('config_text', TextType::class, [
                'label' => $this->trans('Configuration text', 'Modules.Demosymfonyformsimple.Admin'),
                'help' => $this->trans('Maximum 32 characters', 'Modules.Demosymfonyformsimple.Admin'),
            ]);
    }
}

```

This form has only one setting : `config_text`, of type `Symfony\Component\Form\Extension\Core\Type\TextType`. 

### Register your newly created form type

Create a `services.yml` file in `config/`. 

```yml
services:
  _defaults:
    public: true

  # Demo configuration text form
  prestashop.module.demosymfonyformsimple.form.type.demo_configuration_text:
    class: 'PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationFormType'
    parent: 'form.type.translatable.aware'
    public: true
    tags:
      - { name: form.type }
```

This `services.yml` file is registering your `PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationFormType` class as `prestashop.module.demosymfonyformsimple.form.type.demo_configuration_text`. It also add a tag `name: form.type`, and declares it as `public`. 

{{% notice note %}}
You can read more about services in the [official Symfony official documentation](https://symfony.com/doc/4.4/service_container.html)
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
 * Configuration is used to save data to configuration table and retrieve from it.
 */
final class DemoConfigurationTextDataConfiguration implements DataConfigurationInterface
{
    public const DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE = 'DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE';
    public const CONFIG_MAXLENGTH = 32;

    /**
     * @var ConfigurationInterface
     */
    private $configuration;

    public function __construct(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getConfiguration(): array
    {
        $return = [];

        $return['config_text'] = $this->configuration->get(static::DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE);

        return $return;
    }

    public function updateConfiguration(array $configuration): array
    {
        $errors = [];

        if ($this->validateConfiguration($configuration)) {
            if (strlen($configuration['config_text']) <= static::CONFIG_MAXLENGTH) {
                $this->configuration->set(static::DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE, $configuration['config_text']);
            } else {
                $errors[] = 'DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE value is too long';
            }
        }

        /* Errors are returned here. */
        return $errors;
    }

    /**
     * Ensure the parameters passed are valid.
     *
     * @return bool Returns true if no exception are thrown
     */
    public function validateConfiguration(array $configuration): bool
    {
        return isset($configuration['config_text']);
    }
}
```

`DemoConfigurationTextDataConfiguration` maps the `config_text` from the Form Type to the `DEMO_SYMFONY_FORM_SIMPLE_TEXT_TYPE` configuration data key. 

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
 * Provider is responsible for providing form data, in this case, it is returned from the configuration component.
 *
 * Class DemoConfigurationTextFormDataProvider
 */
class DemoConfigurationTextFormDataProvider implements FormDataProviderInterface
{
    /**
     * @var DataConfigurationInterface
     */
    private $demoConfigurationTextDataConfiguration;

    public function __construct(DataConfigurationInterface $demoConfigurationTextDataConfiguration)
    {
        $this->demoConfigurationTextDataConfiguration = $demoConfigurationTextDataConfiguration;
    }

    public function getData(): array
    {
        return $this->demoConfigurationTextDataConfiguration->getConfiguration();
    }

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

By receiving an instance of `DemoConfigurationTextFormDataProvider` and `DemoConfigurationFormType`, the PrestaShop native Form Handler is able to process the data it receives.

Simply register it in `config/services.yml`: 

```yml
  prestashop.module.demosymfonyformsimple.form.demo_configuration_text_form_data_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\Handler'
    arguments:
      - '@form.factory'
      - '@prestashop.core.hook.dispatcher'
      - '@prestashop.module.demosymfonyformsimple.form.demo_configuration_text_form_data_provider'
      - 'PrestaShop\Module\DemoSymfonyFormSimple\Form\DemoConfigurationFormType'
      - 'DemoConfiguration'
```

## Create the form templates

Create a `form.html.twig` file in `views/templates/admin`. 

```html
{% extends '@PrestaShop/Admin/layout.html.twig' %}

{% block content %}
  {{ form_start(demoConfigurationForm) }}
  <div class="card">
    <h3 class="card-header">
      <i class="material-icons">settings</i> {{ 'Text form types'|trans({}, 'Modules.Demosymfonyformsimple.Admin') }}
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

                return $this->redirectToRoute('demo_configuration_form_simple');
            }

            $this->flashErrors($errors);
        }

        return $this->render('@Modules/demosymfonyformsimple/views/templates/admin/form.html.twig', [
            'demoConfigurationForm' => $textForm->createView()
        ]);
    }
}

```

{{% notice note %}}
You can read more about controllers in [controller & routing section]({{<relref "/8/development/architecture/modern/controller-routing">}}) and [in the official Symfony documentation](https://symfony.com/doc/4.4/controller.html)
{{% /notice %}}

### Create a route for the configuration controller

Create a `routes.yml` file in `config/`. 

```yml
demo_configuration_form_simple:
  path: /demosymfonyformsimple/configuration
  methods: [GET, POST]
  defaults:
    _controller: 'PrestaShop\Module\DemoSymfonyFormSimple\Controller\DemoConfigurationController::index'
    # Needed to work with tab system
    _legacy_controller: AdminDemoSymfonyFormSimple
    _legacy_link: AdminDemoSymfonyFormSimple
```

## Add this route to the getContent() method of the module

The `getContent()` method of a module is the method called when accessing the configuration page of the module. 

Add this method to your module, with a redirection to the route previously registered.

```php
  public function getContent()
  {
      $route = $this->get('router')->generate('demo_configuration_form_simple');
      Tools::redirectAdmin($route);
  }
```

## Install and enable your module

Go to the Back Office, and in Modules Manager, find your module and install it. 

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

The module created in this guide is available [here](https://github.com/PrestaShop/example-modules/tree/8.x/demosymfonyformsimple).

## Other form types

You can use all [native Symfony Form Types](https://symfony.com/doc/4.4/reference/forms/types.html), and the PrestaShop specific ones: [see Form Types reference]({{<relref "/8/development/components/form/types-reference">}}).

{{% notice note %}}
Please refer to this example module for a complete implementation of those fields: [DemoSymfonyForm](https://github.com/PrestaShop/example-modules/tree/8.x/demosymfonyform)
{{% /notice %}}

### Required Javascript for some types

Some types require JavaScript component initialization to work correctly. 

Add a JS file to your form's twig template: 

```html
{% block javascripts %}
  {{ parent() }}
  <script src="{{ asset('../modules/demosymfonyform/views/js/form.js') }}"></script>
{% endblock %}
```

And add the following JavaScript code to this file:

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
The JavaScript dependencies of specific types are [described in the form types reference]({{<relref "/8/development/components/form/types-reference">}})
{{% /notice %}}

{{% notice note %}}
You can check this module to see an example of using JavaScript components: [DemoSymfonyForm](https://github.com/PrestaShop/example-modules/tree/8.x/demosymfonyform)
{{% /notice %}}
