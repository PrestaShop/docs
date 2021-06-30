---
title: Symfony form in module
weight: 10
---

# Symfony forms

One of key objectives in PrestaShop's migration to Symfony is migrating legacy PrestaShop forms to architecture based on Symfony Forms. https://symfony.com/doc/3.4/forms.html 

Module developers can use Symfony Forms in they modules as well. Symfony documentation gives a lot of useful information about forms, but there are some things that are specific to PrestaShop.

# Getting started


In order to use Symfony form in your module you require:

1) A form type
2) A template to display that form type
3) A way to handle that form.


## Form type

You can use any of Symfony's form types (https://symfony.com/doc/3.4/reference/forms/types.html) for you forms in PrestaShop. Just make sure that you pick correct version of Symfony in the documentation.
Currently PrestaShop uses Symfony 3.4
PrestaShop also created some custom form types, you can use them freely in your forms as well. (https://devdocs.prestashop.com/1.7/development/components/form/types-reference/).

## Template

In order to correctly render the form you require to get FormView of that form.

First step is to build form from Form Type. In Symfony you would usually use Symfony's FormBuilder for that, but in PrestaShop it depends on what type of form you are creating.

##### Settings form

Settings form in PrestaShop can be created using PrestaShop\PrestaShop\Core\Form\Handler.php

It still uses the same FormFactory as Symfony does, but it also sets data to the form and calls the hook specific to that form. 

You cam find detailed documentation to how Settings form works here:
https://devdocs.prestashop.com/1.7/development/architecture/migration-guide/forms/settings-forms/

And in this example module you can find an implementation:
https://github.com/PrestaShop/example-modules/tree/master/demosymfonyform

##### CRUD Form

CRUD form is more complicated because it works with logic objects. 
You can use ``PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Builder\FormBuilder`` to get the form. 
Form builder will require form type and data provider. Data provider is needed in order to fill form with data if it's an edit form. 
Data provider must implement FormDataProviderInterface where you have functions ``getData($id)`` (retrieve data based on id) and ``getDefaultData()``.

CRUD form handler:
https://devdocs.prestashop.com/1.7/development/architecture/migration-guide/forms/crud-forms/


After setting up form handler. You can use it to retrieve the form.

```php
$textForm = $textFormDataHandler->getForm();
```

After retrieving form you can use it to get create form view which then can be used in twig template to render said form.

```php
$this->render('@Modules/demosymfonyform/views/templates/admin/form.html.twig', [
            'demoConfigurationTextForm' => $textForm->createView(),
        ]);
````

In twig before PrestaShop 1.7.8 you needed to define every field for best results. 
This allows for greater control over the form as you can define HTML exactly as you need it, but it's requires extra work if all you need is a standard form.

```twig
{% extends '@PrestaShop/Admin/layout.html.twig' %}

{# PrestaShop made some modifications to the way forms are displayed to work well with PrestaShop in order to benefit from those you need to use ui kit as theme#}
{% form_theme demoConfigurationTextForm 'PrestaShopBundle:Admin/TwigTemplateForm:prestashop_ui_kit.html.twig' %}

{% block content %}
  {{ form_start(demoConfigurationTextForm) }}
  <div class="card">
    <h3 class="card-header">
      <i class="material-icons">settings</i> {{ 'Text form types'|trans({}, 'Modules.DemoSymfonyForm.Admin') }}
    </h3>
    <div class="card-block row">
      <div class="card-text">
          <div class="form-group row">
            {{ ps.label_with_help(('Translatable type'|trans), ('This is translatable type'|trans({}, 'Modules.DemoSymfonyForm.Admin'))) }}
            <div class="col-sm">
              {{ form_errors(demoConfigurationTextForm.translatable_type) }}
              {{ form_widget(demoConfigurationTextForm.translatable_type) }}
              <small class="form-text">{{ 'Have specific needs? Edit particular groups to let them see prices or not.'|trans({}, 'Admin.Shopparameters.Help') }}</small>
            </div>
          </div>
          <div class="form-group row catalog-mode-option">
            {{ 'Generatable text type'|trans({}, 'Modules.DemoSymfonyForm.Admin') }}
            <div class="col-sm">
              {{ form_errors(demoConfigurationTextForm.generatable_text_type) }}
              {{ form_widget(demoConfigurationTextForm.generatable_text_type) }}
            </div>
          </div>
          {% block product_general_preferences_form_rest %}
            {{ form_rest(generalForm) }}
          {% endblock %}
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
  {{ form_end(demoConfigurationTextForm) }}
{% endblock %}
```

In 1.7.8 major updates were made to PrestaShop's form theme in order to make working with forms as straightforward as possible.
Now it's enough to add template file once and never go back to it again. All further modifications can be done using form type.

```twig
{% extends '@PrestaShop/Admin/layout.html.twig' %}

{# PrestaShop made some modifications to the way forms are displayed to work well with PrestaShop in order to benefit from those you need to use ui kit as theme#}
{% form_theme demoConfigurationTextForm 'PrestaShopBundle:Admin/TwigTemplateForm:prestashop_ui_kit.html.twig' %}

{% block content %}
  {{ form_start(demoConfigurationTextForm) }}
  <div class="card">
    <h3 class="card-header">
      <i class="material-icons">settings</i> {{ 'Text form types'|trans({}, 'Modules.DemoSymfonyForm.Admin') }}
    </h3>
    <div class="card-block row">
      <div class="card-text">
        {{ form_widget(demoConfigurationTextForm) }}
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
  {{ form_end(demoConfigurationTextForm) }}
{% endblock %}
```


{{% notice note %}}
Some form types may require JS components. You can always check documentation for specific form type if it requires one.
You can find out more about JS components here: https://devdocs.prestashop.com/1.7/development/components/global-components/
{{% /notice %}}


## Form handling

At this point you should have form rendered successfully, so it's time to handle the form.

Usually you handle the form in the same action that renders form tempalate. You just need to check if the form is submitted using ``isSubmitted`` function.
```php
if ($textForm->isSubmitted()) {
}
``` 

You should also check if the form is valid if you are using constraints.

```php
if ($textForm->isSubmitted() && $textForm->isValid()) {
        
}
```


Inside this ``if`` you can handle the form. You can data submitted in the form using forms ``getData`` and you can handle that data any way you want.
It's advised to use PrestaShops form handlers as it saves you some work and also calls hooks so other modules can interact with your forms if needed. There are multiple handlers, so it depends on what type of form do you have.

##### Settings form

Settings form in PrestaShop can be handled with same handler it was created: ``PrestaShop\PrestaShop\Core\Form\Handler.php``. You need to use it's ``save`` function.
 ```php
 if ($textForm->isSubmitted() && $textForm->isValid()) {
            /** You can return array of errors in form handler and they can be displayed to user with flashErrors */
            $errors = $textFormDataHandler->save($textForm->getData());

            if (empty($errors)) {
                $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));

                return $this->redirectToRoute('demo_configuration_form');
            }

            $this->flashErrors($errors);
        }
```

When defining service for Handler one of arguments is a class implements interface ``PrestaShop\PrestaShop\Core\Form\FormDataProviderInterface``, 
In that class you can use ``setData`` function to save data and pass back any errors, so it can also be used for validation.

```php
class DemoConfigurationChoiceFormDataProvider implements FormDataProviderInterface
{
    /** If you want to prefill your from with data when it's loaded(previous values if it's setting form) you can return that data here */
    public function getData(): array
    {
        return $this->getData();
    }

    public function setData(array $data): array
    {
        $this->saveData($data);
        /** You can return array of errors if something gfoes wrong */
        return ['Something went wrong'];

    }
}
```

##### CRUD Form

To handle CRUD form PrestaShop uses ``PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Handler``
You can use ``FormHandlerFactory`` ``create`` function in order to create the handler. Primary argument you need here is DataHandler which would be responsible for saving your data.

It needs to implement ``FormDataHandlerInterface`` and can be passed to your form handler in a service.

```yaml
  prestashop.core.form.identifiable_object.handler.feature_form_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Handler\FormHandler'
    factory: 'prestashop.core.form.identifiable_object.handler.form_handler_factory:create'
    arguments:
      #  Your data handler
      - '@prestashop.core.form.identifiable_object.data_handler.feature_form_data_handler'
```

Data handler has to functions ``create`` and ``update`` where you need to define logic for your object. 

In controller use either ``FormHandler->handle`` or ``FormHandler->handleFor``.

``handleFor`` requires you to have pass an ID as it's used to update object, while ``handle`` is used to create one.


##### Using different form action
In some cases you want to use new action for form saving (for example if you have multiple forms in one page and you want each to have separate action)
In that case you can define route in template file, you need to modify a ``form_start`` and add path to your action.
```twig
 {{ form_start(demoConfigurationChoiceForm, {attr : {class: 'form'}, action: path('demo_configuration_choices_form_save') }) }}
```

In that case when you are done handling the form you will need to redirect back to original form. You can pass success or error messages using controller function
``addFlash``. You can't use constraints when handling form like this since after redirecting you won't see any error messages. ``$textForm->isValid()`` will still return negative however so it's advise to not to use it, validate during form handling and add errors using ``addFlash``.  
##### 

```php
<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Location: ../');
exit;
```