---
title: Alter Configuration Back Office forms
weight: 4
---

# Alter configuration forms on modern pages
{{< minver v="1.7.4" title="true" >}}

One of the most common tasks for the PrestaShop developers is to alter the data and make it manageable for customers.
In PrestaShop 1.6, a specific Form framework was created to help developers. In PrestaShop 1.7, the system has changed as we now rely on the Symfony Form component.

{{% notice info %}}
**This system only works with pages from the "Configure" section of your back office.**

If you want to customize an entity form, you're looking for [Grid]({{<relref "8/development/components/grid/" >}}) and [Identifiable Objects]({{<relref "/8/development/architecture/migration-guide/forms/crud-forms">}}).

Learn how to achieve this with the [Grid and identifiable object form hooks usage example]({{<relref "/8/modules/sample-modules/grid-and-identifiable-object-form-hooks-usage">}}).
{{% /notice %}}

Let's see an example on how to add, populate, validate and persist a new form field in PrestaShop 1.7.

#### Create the module and register the hooks

```php
<?php
# /modules/module_name/module_name.php

public function hookActionAdministrationPageForm(&$hookParams)
{
    $formBuilder = $hookParams['form_builder'];
    $uploadQuotaForm = $formBuilder->get('upload_quota');
    $uploadQuotaForm->add(
        'description', 
        TextType::class, 
        [
            'data' => 'A description',
            'label' => 'Description'
        ]
    );
}

public function hookActionAdministrationPageSave(&$hookParams)
{
    // retrieve and validate the data
    dump($hookParams['form_data']['upload_quota']['description']);

    // if the data is invalid, populate `errors` array
    dump($hookParams['errors']);
}
```

The form field should be available in the selected form, can be validated and persisted in the database if valid using the provided hooks. If you access the Administration page in Back Office, you should see the new form field:

![form](../img/form-field.png)

#### Templating

Of course, you can override every template to improve again the rendering of the form (the Back Office theme may be/will be improved in future versions)

```html
# /modules/module_name/views/PrestaShop/Admin/AdvancedParameters/administration.html.twig
{% block administration_form_upload_quota %}
    <div class="col">
        <div class="card">
            <h3 class="card-header">
                <i class="material-icons">file_upload</i> {{ 'Upload quota'|trans }}
            </h3>
            <div class="card-block">
                <div class="card-text">
                    <div class="form-group">
                        {{ ps.label_with_help(('Maximum size for attached files'|trans), ('Set the maximum size allowed for attachment files (in megabytes). This value has to be lower or equal to the maximum file upload allotted by your server (currently: %size% MB).'|trans({'%size%': 'PS_ATTACHMENT_MAXIMUM_SIZE'|configuration}, 'Admin.Advparameters.Help'))) }}
                        {{ form_errors(uploadQuotaForm.max_size_attached_files) }}
                        {{ form_widget(uploadQuotaForm.max_size_attached_files) }}
                    </div>
                    <div class="form-group">
                        {{ ps.label_with_help(('Maximum size for a downloadable product'|trans), ('Define the upload limit for a downloadable product (in megabytes). This value has to be lower or equal to the maximum file upload allotted by your server (currently: %size% MB).'|trans({'%size%': 'PS_LIMIT_UPLOAD_FILE_VALUE'|configuration}, 'Admin.Advparameters.Help'))) }}
                        {{ form_errors(uploadQuotaForm.max_size_downloadable_product) }}
                        {{ form_widget(uploadQuotaForm.max_size_downloadable_product) }}
                    </div>
                    <div class="form-group">
                        {{ ps.label_with_help(("Maximum size for a product's image"|trans), ('Define the upload limit for an image (in megabytes). This value has to be lower or equal to the maximum file upload allotted by your server (currently: %size% MB).'|trans({'%size%': 'PS_LIMIT_UPLOAD_IMAGE_VALUE'|configuration}, 'Admin.Advparameters.Help'))) }}
                        {{ form_errors(uploadQuotaForm.max_size_product_image) }}
                        {{ form_widget(uploadQuotaForm.max_size_product_image) }}
                    </div>

                    {# Do what you need to do, I'm really bad at designing pages ^o^ #}
                    <div class="form-group">
                        {{ form_label(uploadQuotaForm.description) }}
                        {{ form_widget(uploadQuotaForm.description) }}
                        {{ form_errors(uploadQuotaForm.description) }}
                    </div>
                    {{ form_rest(uploadQuotaForm) }}
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
```

#### Handle form error in the product page form

If we want to manage errors of the product page, adding text in controller->errors (like in the legacy controllers) is not working, we have to add your error in a specific syntax and return a json array of errors.

Assuming we want to notify an error when validating the Product form on the field with the id `form_step6_myfield`, this is the correct method to display an error message to the user.

In the hook (`actionProductUpdate`, `actionAdminProductsControllerSaveAfter`, ...):

```php
<?php
// add error
Context::getContext()->controller->errors['step6_myfield'] = [$this->l('Syntax error in field')];

// return error 
if (Context::getContext()->controller->errors) {
    http_response_code(400);
    die(json_encode(Context::getContext()->controller->errors));
}
```

```html
<input type="text" id="form_step6_myfield" name="whatever" />
```
