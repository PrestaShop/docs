---
title: Forms
menuTitle: Forms
weight: 20
---

# Forms

## Legacy forms

Forms are the biggest part of the migration. Before, we had form helpers that took care of generating, validating and handling everything. In Symfony, every step (creation, validation and request handling) needs to be specified by the developer.

For instance, this is code that you can find in a Legacy Controller:

```php
<?php
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
Modern pages use Symfony forms. To learn the basics of Symfony forms, read their [official documentation](https://symfony.com/doc/4.4/forms.html).
{{% /notice %}}

### Form types

Form types must be created in the `src/PrestaShopBundle/Form/Admin/{Menu}/{Page}/` folder. You can check out the existing forms to see how they are created. If you already know your way around Symfony forms, most of this will sound familiar to you.  

PrestaShop provides some built-in Form types that will help you integrate the specific form components PrestaShop uses in the Back Office. You'll find them inside the *Types* folder:

* `ChoiceCategoriesTreeType`
* `CustomMoneyType`
* `DatePickerType`
* `TextWithUnitType`
* ...

Reference of existing [back office form types can be found here]({{<relref "/8/development/components/form/types-reference/">}}). 

Most of the components from the PrestaShop UI Kit are implemented as Form Types.

{{% notice note %}}
Before creating a new form type, check in the reference or in `src/PrestaShopBundle/Form/Admin/Type` folder first to see if the type already exists.
{{% /notice %}}

Forms are created and declared [as services](https://symfony.com/doc/4.4/form/form_dependencies.html) that you can use inside your Controllers – this is covered in the [Controllers/Routing section]({{< relref "/8/development/architecture/migration-guide/controller-routing" >}}) of this guide.

## Learn more

{{% children /%}}

