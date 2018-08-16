---
title: Forms
weight: 20
---

# Forms

## Legacy forms

Forms are the biggest part of the migration. Before, we had form helpers that took care of generating, validating and handling everything. In Symfony, every step (creation, validation and request handling) needs to be specified by the developer.

For instance, this is code that you can find in a Legacy Controller:

```php
$this->fields_options = array(
    'general' => array(
        'title' => $this->trans('Logs by email', array(), 'Admin.Advparameters.Feature'),
        'icon' => 'icon-envelope',
        'fields' => array(
            'PS_LOGS_BY_EMAIL' => array(
                'title' => $this->trans('Minimum severity level', array(), 'Admin.Advparameters.Feature'),
                'hint' => $this->trans('Enter "5" if you do not want to receive any emails.', array(), 'Admin.Advparameters.Help'),
                'cast' => 'intval',
                'type' => 'text',
            ),
        ),
        'submit' => array('title' => $this->trans('Save', array(), 'Admin.Actions')),
    ),
);
```

This is how this configuration is rendered by the legacy controller, without having to write anything in the templates:

![Logs by email form](../img/legacy-rendered-form.png)

The block is rendered and mapped to the controller url, the form is validated and mapped to the `PS_LOGS_BY_EMAIL` configuration key and automatically persisted in database, the label has a _hint_ message in rollover.

Let's see how this is done in modern pages.

## Modern forms

In modern pages, form management is decoupled from Controllers. You need to create your forms, validate them, map them to the current HTTP request and persist data yourself. You also need to create your form templates too, but we have a nice form theme which will help you a lot.

{{% notice tip %}}
Modern pages use Symfony forms. To learn the basics of Symfony forms, read their [official documentation](http://symfony.com/doc/3.4/forms.html).
{{% /notice %}}

### Form types

Form types must be created in the `src/PrestaShopBundle/Form/Admin/{Menu}/{Page}/` folder. You can check out the existing forms to see how they are created. If you already know your way around Symfony forms, most of this will sound familiar to you.  

PrestaShop provides some built-in Form types that will help you integrate the specific form components PrestaShop uses in the Back Office. You'll find them inside the *Types* folder:

* `ChoiceCategoryTreeType`
* `CustomMoneyType`
* `DatePickerType`
* `TextWithUnitType`
* ...

Most of the components from the PrestaShop UI Kit are implemented as Form Types.

{{% notice note %}}
Before creating a new form type, check this folder first to see if the type already exists.
{{% /notice %}}

Forms are created and declared [as services](http://symfony.com/doc/3.4/form/form_dependencies.html#define-your-form-as-a-service) that you can use inside your Controllers – this is covered in the [Controllers/Routing section]({{< relref "#controller-routing" >}}) of this guide.

### Form Data Providers

In order to load existing data into the form (when editing, for instance) and save the form data (when the form is submitted), you need to create and register a **Form Data Provider**.

You can create your own based on one of the existing implementations, or on the interface:

```php
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

### Form Handlers

Once you are able to manage data loaded to or sent by your forms, you need a way to build those forms (which can be themselves composed of multiple forms).
 
For this, you need a Form Handler. You can either implement it yourself as a class (based on the interface `PrestaShop\PrestaShop\Core\Form\FormHandlerInterface`), or use PrestaShop's core `FormHandler` to create a service in a declarative way – no need for a new class!.

As an example, here's how the Administration page's Form Handler service is declared:

```yaml
# /src/PrestaShopBundle/Resources/config/services/form/form_handler.yml

    prestashop.adapter.administration.form_handler:
        class: 'PrestaShop\PrestaShop\Core\Form\FormHandler'
        arguments:
            - '@=service("form.factory").createBuilder()'
            - '@prestashop.hook.dispatcher'
            - '@prestashop.adapter.administration.form_provider'
            -
              'general': 'PrestaShopBundle\Form\Admin\AdvancedParameters\Administration\GeneralType'
              'upload_quota': 'PrestaShopBundle\Form\Admin\AdvancedParameters\Administration\UploadQuotaType'
              'notifications': 'PrestaShopBundle\Form\Admin\AdvancedParameters\Administration\NotificationsType'
            - 'AdministrationPage'
```

Let's look at the arguments one by one:

- `'@=service("form.factory").createBuilder()'`
    
    This is used to render the form. You can keep the default value.
    
- `'@prestashop.hook.dispatcher'`

    This is used to dispatch hooks related to the form. You can also keep this value by default.
     
- `'@prestashop.adapter.administration.form_provider'`
 
    Here you need to specify your form's Data Provider.
 
- The fourth argument is an associative array containing the names and FQCN of the form types you want to render in your form.

    **Important:** The names correspond to the data fields that will be loaded/saved to your Data Providers. 

- `'AdministrationPage'` 

    The last argument is the name used to generate the hooks.


### Form request handling in Controllers

In modern pages, Controllers have or should have only one responsability: handle the User request and return a response. This is why in modern pages, controllers should be as thin as possible and rely on specific classes (services) to manage the data. As always, check out the existing implementations, like in the [PerformanceController](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php).

This is how we manage a form submit inside a Controller:

```php
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

The following schema sums up how Form Handlers, Form Builders, Controllers and Data Providers are wired together.

- [JPEG version](../img/form-schema.jpg)
- [XML version](/schemas/1.7/form-schema.xml) (open it using [draw.io](https://draw.io))
{{% /callout %}}

### Render the form using Twig

The rendering of forms in Twig is already described by the [Symfony documentation](https://symfony.com/doc/3.4/form/rendering.html). PrestaShop uses its own [Form theme](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig) that contains specific markup for the PrestaShop UI Kit. You can see it as a customized version of Symfony's Bootstrap 4 form theme, even though it's not directly based on it.

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
