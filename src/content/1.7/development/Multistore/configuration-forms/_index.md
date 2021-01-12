---
title: Configuration forms
menuTitle: Configuration forms
summary: "Configuration forms when multistore is enabled"
weight: 50
---

# Configuration forms in multistore context
{{< minver v="1.7.8" title="true" >}}

Since Prestashop 1.7.8, when multistore is enabled, migrated configuration forms can display a checkbox before the fields in order to specify if the configuration value is set for the current context shop/group, or if it is a value inherited from all contexts, or from a shop group.

If you're developing a configuration form and you want it to take into account the current multistore context, then you must make your form compatible with our multistore checkboxes. This is made possible thanks to [Symfony's form extensions mechanism](https://symfony.com/doc/3.4/form/create_form_type_extension.html).



## Creating a multistore compatible configuration form

A Symfony form extension called MultistoreConfigurationTypeExtension has been created in order to make it easy to add multistore checkboxes to a configuration form.

In order to extend this form extension, your Symfony form type must implement a `getParent()` method returning `MultistoreConfigurationType::class`.

```php
<?php

    /**
     * {@inheritdoc}
     *
     * @see MultistoreConfigurationTypeExtension
     */
    public function getParent(): string
    {
        return MultistoreConfigurationType::class;
    }
```

Then for each form elements that should have its multistore checkbox, you must add a `multistore_configuration_key` attribute, with the configuration key to which it should be attached as a value:

```php
<?php
class MyFormType extends TranslatorAwareType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'my_field',
                SwitchType::class,
                [
                    'required' => true,
                    // Here we add the multistore_configuration_key attribute with the configuration key it is linked to.
                    'attr' => [
                        'multistore_configuration_key' => 'THE_CONFIGURATION_KEY',
                    ],
                    // ...
                ]
            )
        // ...

```

Doing this will have several effects:

- Each field implementing the `multistore_configuration_key` will have a multistore checkbox before them.
- The checkboxes will automatically be checked or not depending on the configuration for the current shop context.
- When the configuration value is inherited, the checkbox will be unchecked, and the field disabled and greyed out.
- Checking or unchecking a checkbox will enable/disable the field for the current shop context.


## Saving data from a multistore configuration form

- When receiving the data from the form, you will also receive values from the multistore checkboxes that were added to your form.
- Fields having their multistore checkboxes unchecked should not be saved.

Multistore checkboxes' names begin with `multistore_` followed by the name of the field it is applied to. For example the checkbox having the name `multistore_maintenance_text` applies to the field having the name `maintenance_text`. On the frontend part, if the checkbox is unchecked, the corresponding field has been disabled, but it would be a good idea to check in the backend that when a checkbox is unchecked, you don't deal with the data of its corresponding field, and to remove the disabled fields from the list of fields that will be treated, here is an example from `src/Adapter/Shop/MaintenanceConfiguration.php`:

```php
<?php

    public function removeDisabledFields(array $configuration): array
    {
        if ($this->shopContext->isAllShopContext()) {
            return $configuration;
        }

        // Remove fields that have their multistore checkbox unchecked
        foreach ($configuration as $key => $value) {
            if (substr($key, 0, 11) !== 'multistore_' && $configuration['multistore_' . $key] !== true) {
                unset($configuration[$key]);
            }
        }

        return $configuration;
    }
````


