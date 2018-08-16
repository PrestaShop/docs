---
title: Alter Back Office forms
weight: 4
aliases:
- /1.7/modules/concepts/hooks/alter_forms_on_modern_pages
- /1.7/modules/concepts/hooks/alter-forms-on-modern-pages
---

# Alter forms on modern pages
{{< minver v="1.7.4" title="true" >}}

One of the most common tasks for the PrestaShop developers is to alter the data and make it manageable for customers.
In PrestaShop 1.6, a specific Form framework was created to help developers. In PrestaShop 1.7, the system has changed as we now rely on the Symfony Form component.

Let's see an example on how to add, populate, validate and persist a new form field in PrestaShop 1.7.

#### Create the module and register the hooks

```php
# /modules/module_name/module_name.php

public function hookDisplayAdministrationPageForm(&$hookParams)
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

public function hookActionAdministrationPageFormSave(&$hookParams)
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

