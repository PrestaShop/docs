---
title: Settings Forms
weight: 20

---

# Settings Forms

## Introduction

In PrestaShop, there are a lots of settings forms that require a unified way to handle of them. To move the settings creation and update out of controllers the following components are being used:

* **Form Data Provider** - responsible for options data retrieval and saving the data.
* **Form Handler** - responsible for building the form.

## Form Data Providers

In order to load existing data into the form (when editing, for instance) and save the form data (when the form is submitted), you need to create and register a **Form Data Provider**.

You can create your own based on one of the existing implementations, or on the interface:

```php
<?php
namespace PrestaShop\PrestaShop\Core\Form;

interface FormDataProviderInterface
{
    /**
     * @return array the form data as an associative array
     */
    public function getData();

    /**
     * Persists form Data in Database and Filesystem.
     *
     * @param array $data
     * @return array $errors if data can't persisted an array of errors messages
     * @throws UndefinedOptionsException
     */
    public function setData(array $data);
}
```

The idea is to uncouple data management from Controllers, so populating the form and saving form data will be done in these classes. Be aware though, you shouldn't manipulate the database here – that task need to be delegated to dedicated classes.

## Form Handlers

Once you are able to manage data loaded to or sent by your forms, you need a way to build those forms (which can be themselves composed of multiple forms).
 
For this, you need a Form Handler. You can either implement it yourself as a class (based on the interface `PrestaShop\PrestaShop\Core\Form\FormHandlerInterface`), or use PrestaShop's core `FormHandler` to create a service in a declarative way – no need for a new class!

As an example, here's how the Administration page's Form Handler service is declared:

```yaml
# /src/PrestaShopBundle/Resources/config/services/form/form_handler.yml

prestashop.adapter.administration.general.form_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\Handler'
    arguments:
        - '@form.factory'
        - '@prestashop.core.hook.dispatcher'
        - '@prestashop.adapter.administration.general.form_provider'
        - 'PrestaShopBundle\Form\Admin\Configure\AdvancedParameters\Administration\GeneralType'
        - 'AdministrationPageGeneral'
        - 'general'
```

Let's look at the arguments one by one:

- `'@form.factory'`
    
    This is used to render the form. You can keep the default value.
    
- `'@prestashop.core.hook.dispatcher'`

    This is used to dispatch hooks related to the form. You can also keep this value by default.
     
- `'@prestashop.adapter.administration.form_provider'`
 
    Here you need to specify your form's Data Provider.
 
- `'PrestaShopBundle\Form\Admin\Configure\AdvancedParameters\Administration\GeneralType'`is the FQCN of the form type you want to render in your form.

- `'AdministrationPageGeneral'`

    This argument is the name used to generate the hooks.

- `'general'`

    The last argument is the name of the form.


## Form request handling in Controllers

In modern pages, Controllers have or should have only one responsibility: handle the User request and return a response. This is why in modern pages, controllers should be as thin as possible and rely on specific classes (services) to manage the data. As always, check out the existing implementations, like in the [PerformanceController](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php).

This is how we manage a form submit inside a Controller:

```php
<?php
$form = $this->get('prestashop.adapter.performance.form_handler')->getForm();
$form->handleRequest($request);

if ($form->isSubmitted()) {
    $data = $form->getData();
    $saveErrors = $this->get('prestashop.adapter.performance.form_handler')->save($data);
    
    if (0 === count($saveErrors)) {
        $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));
        return $this->redirectToRoute('admin_performance');
    }
    
    $this->flashErrors($saveErrors);
}

return $this->redirectToRoute('admin_performance');
```

So, there are basically three steps:

1. Get information from User request and get form data;
2. If form has been submitted, validate the form;
3. If form is valid, save it. Else, return form errors and redirect.

{{% notice note %}}
Every form in modern controllers must be handled this way, and the controller code should be kept minimalist and easy to read and understand.
{{% /notice %}}

{{% callout %}}
##### Summary with a schema

The following schemas sums up how Form Handlers, Form Builders, Controllers and Data Providers are wired together.

###### Display Form schema

{{< figure src="../img/form-display.svg" title="Display Form schema" >}}

{{% notice note %}}
You can update this schema using the [source XML file](/8/schemas/form-display.xml) importable in services like [draw.io](https://draw.io).
{{% /notice %}}

###### Submit Form schema

{{< figure src="../img/form-submit.svg" title="Submit Form schema" >}}

{{% notice note %}}
You can update this schema using the [source XML file](/8/schemas/form-submit.xml) importable in services like [draw.io](https://draw.io).
{{% /notice %}}

{{% /callout %}}

## Render the form using Twig

The rendering of forms in Twig is already described by the [Symfony documentation](https://symfony.com/doc/4.4/form/rendering.html). PrestaShop uses its own [Form theme](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig) that contains specific markup for the PrestaShop UI Kit. You can see it as a customized version of Symfony's Bootstrap 4 form theme, even though it's not directly based on it.

To sum up how it works, the controller sends an instance of `FormView` to Twig and Twig uses form helpers to render the right markup for every field type (the Form theme defines a specific markup for each Form Type).

```twig
{{ form_start(logsByEmailForm) }}
<div class="col-md-12">
  <div class="col">
    <div class="card">
      <h3 class="card-header">
        <i class="material-icons">business_center</i> {{ 'Logs by email'|trans }}
      </h3>
      <div class="card-block">
        <div class="card-text">
          <div class="form-group row">
          {{ ps.label_with_help(('Minimum severity level'|trans), ('Enter "5" if you do not want to receive any emails.'|trans({}, 'Admin.Advparameters.Feature')), 'col-sm-2') }}
            <div class="col-sm-8">
              {{ form_errors(logsByEmailForm.severity_level) }}
              {{ form_widget(logsByEmailForm.severity_level) }}
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
      </div>
    </div>
  </div>
</div>
{{ form_end(logsByEmailForm) }}
```
All these helpers are documented and help you generate an HTML form from your `FormView` object, using the right markup to be rendered by the PrestaShop UI Kit. Currently, several forms have already been migrated, so you can use them as base for your own work.

All the templates for modern pages can be found in the `src/PrestaShopBundle/Resources/views/Admin` folder. Twig templates for a page are split in subfolders: Forms, Blocks, Lists, Panels. This helps to keep track the role of each template.

Templates should be arranged by page and domain, keeping in mind that each part of template can be overridden by PrestaShop developers using modules. Use templates and Twig blocks wisely to make their job easy.
