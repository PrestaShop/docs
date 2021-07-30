---
title: Forms
weight: 4
chapter: true
---

# Forms

From PrestaShop 1.7, fields are managed in FormField class and display is set in `themes/<themeName>/templates/_partials/form-fields.tpl` template.

The useful methods to manage this fields are:

* **setName**: Set the name of field
* **setType**: Set the type of field (text, checkbox...). Read list below
* **setRequired**:  Set if the field is required or not
* **setLabel**: Set the label of the field
* **setValue**: Set the field value
* **setAvailableValues**: Set the available values for the field, to select among other things
* **addAvailableValue**: Add an available value for the field
* **setMaxLength**: Maximum length of the field
* **setConstraint**: Add a validation constraint to the field, call methods are those of the Validation class (ex isEmail)

Here are all the possible types of fields:

```php
<?php
return [
    // Standard text field
    (new FormField)
        ->setName('first_name')
        ->setType('text')
        ->setRequired(true)
        ->setValue("John")
        ->setMaxLength("128")
        ->setLabel($this->trans('Your first name')),
        
    // File field
    (new FormField)
        ->setName('file_upload')
        ->setType('file')
        ->setLabel($this->l('Upload a document')),
        
    // Select field
    (new FormField)
        ->setName('select_field')
        ->setType('select')
        ->setAvailableValues(['key' => 'value 1', 'key2' => 'value2'])
        ->setLabel($this->l('Select type')),
        
    // Country select field (like select but add a 'js js-country' class)
    (new FormField)
        ->setName('country_field')
        ->setType('countrySelect')
        ->setAvailableValues(['key' => 'value 1', 'key2' => 'value2'])
        ->setLabel($this->l('Country select')),
        
    // Checkbox field
    (new FormField)
        ->setName('checkbox_field')
        ->setType('checkbox')
        ->setValue(1)
        ->setLabel($this->l('Checkbox type')),
        
    // Radio buttons field
    (new FormField)
        ->setName('radio_field')
        ->setType('radio-buttons')
        ->setAvailableValues(['key' => 'value 1', 'key2' => 'value2'])
        ->setLabel($this->l('Radio buttons type')),
        
    // Date field
    (new FormField)
        ->setName('date_field')
        ->setType('date')
        ->setLabel($this->l('Date')),
        
    // Birthday field
    (new FormField)
        ->setName('birthday_field')
        ->setType('birthday')
        ->setLabel($this->l('Birthday')),
        
    // Password field
    (new FormField)
        ->setName('password_field')
        ->setType('password')
        ->setLabel($this->l('Password')),
        
    // Email field
    (new FormField)
        ->setName('email_field')
        ->setType('email')
        ->setLabel($this->l('Email type')),
        
    // Phone field
    (new FormField)
        ->setName('phone_field')
        ->setType('phone')
        ->setLabel($this->l('Phone type')),
        
    // Hidden field
    (new FormField)
        ->setName('hidden_field')
        ->setType('hidden')
        ->setValue('My hidden value')
];
```
