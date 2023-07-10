---
title: Adding a configuration page with Symfony style
weight: 4
---

# Adding a configuration page with Symfony style

With the new Symfony architecture, there is a much modern way of integrating settings forms (`Configure` action) for your modules. 
In this guide, we will explain how to implement such a mecanism in a module. 

Steps: 

- Create the base module
- Create the configuration form
    - Register the configuration form
- Create the form data provider
    - Register the form data provider
- Create and register the form handler
- Create the form templates
- Create the configuration controller
    - Register your route

## Create the base module

[Following this guide]({{<relref "/8/modules/creation/tutorial">}}), create a base module. For our example, the base module is:

```php
<?php

declare(strict_types=1);

use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

class DemoSymfonyForm extends Module
{
    public function __construct()
    {
        $this->name = 'demosymfonyform';
        $this->author = 'PrestaShop';
        $this->version = '1.1.0';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Demo symfony form configuration', [], 'Modules.DemoSymfonyForm.Admin');
        $this->description = $this->trans(
            'Module created for the purpose of showing existing form types within PrestaShop',
            [],
            'Modules.DemoSymfonyForm.Admin'
        );

        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => '8.99.99'];
    }

    public function getContent()
    {
        $route = SymfonyContainer::getInstance()->get('router')->generate('demo_configuration_form');
        Tools::redirectAdmin($route);
    }
}
```

Then, create a `composer.json` file in your module, and register your namespace: 

```json
{
  "name": "prestashop/demosymfonyform",
  "description": "PrestaShop - Settings Form Examples",
  "license": "AFL-3.0",
  "authors": [
    {
      "name": "PrestaShop Core Team"
    }
  ],
  "autoload": {
    "psr-4": {
      "PrestaShop\\Module\\DemoSymfonyForm\\": "src/"
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

## Create the configuration form type

First thing to create is the form type for our configuration form. 

Create a `DemoConfigurationFormType.php` file in `src/Form`.

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoSymfonyForm\Form;

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
                'label' => $this->trans('Configuration text', 'Modules.DemoSymfonyForm.Admin'),
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
  prestashop.module.demosymfonyform.form.type.demo_configuration_text:
    class: 'PrestaShop\Module\DemoSymfonyForm\Form\DemoConfigurationTextType'
    parent: 'form.type.translatable.aware'
    public: true
    tags:
      - { name: form.type }
```

This `services.yml` file is registering your `PrestaShop\Module\DemoSymfonyForm\Form\DemoConfigurationTextType` class as `prestashop.module.demosymfonyform.form.type.demo_configuration_text`. It also add a tag `name: form.type`, and declares it as `public`. 

## Create the form data provider

Create a `DemoConfigurationTextFormDataProvider.php` file in `src/Form`.

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoSymfonyForm\Form;

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
  prestashop.module.demosymfonyform.form.demo_configuration_text_form_data_provider:
    class: 'PrestaShop\Module\DemoSymfonyForm\Form\DemoConfigurationTextFormDataProvider'
    arguments:
      - '@prestashop.module.demosymfonyform.form.demo_configuration_text_data_configuration'
```

## Create and register the form handler

For this form handler, we don't need to create a new class, we can use PrestaShop native's one.
Simply register it in `config/services.yml`: 

```yml
  prestashop.module.demosymfonyform.form.demo_configuration_text_form_data_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\Handler'
    arguments:
      - '@form.factory'
      - '@prestashop.core.hook.dispatcher'
      - '@prestashop.module.demosymfonyform.form.demo_configuration_text_form_data_provider'
      - 'PrestaShop\Module\DemoSymfonyForm\Form\DemoConfigurationTextType'
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
      <i class="material-icons">settings</i> {{ 'Text form types'|trans({}, 'Modules.DemoSymfonyForm.Admin') }}
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

## Create a route for the configuration controller

Create a `routes.yml` file in `config/`. 

```yml
demo_configuration_form:
  path: /demosymfonyform/configuration
  methods: [GET, POST]
  defaults:
    _controller: 'PrestaShop\Module\DemoSymfonyForm\Controller\DemoConfigurationController::index'
    # Needed to work with tab system
    _legacy_controller: AdminDemoSymfonyForm
    _legacy_link: AdminDemoSymfonyForm
```

## Create the configuration controller

Create a `DemoConfigurationController.php` file in `src/Controller`. 

```php
<?php

declare(strict_types=1);

namespace PrestaShop\Module\DemoSymfonyForm\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoConfigurationController extends FrameworkBundleAdminController
{
    public function index(Request $request): Response
    {
        $textFormDataHandler = $this->get('prestashop.module.demosymfonyform.form.demo_configuration_text_form_data_handler');

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

        return $this->render('@Modules/demosymfonyform/views/templates/admin/form.html.twig', [
            'demoConfigurationForm' => $textForm->createView(),
        ]);
    }
}