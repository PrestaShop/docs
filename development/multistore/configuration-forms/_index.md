---
title: Configuration forms
menuTitle: Configuration forms
summary: "Configuration forms when multistore is enabled"
weight: 50
---

# Configuration forms in multistore context

The Back Office contains multiple configuration forms that control settings of the shop. When multistore is enabled, Back Office user must be able to modify these settings either for all shops, for a group of shop or for a single shop.

Migrated configuration forms can display a checkbox before fields in order to specify if the configuration value is set for the current context shop/group, or if it is a value inherited from all contexts, or from a shop group. It will also display a dropdown at the right of the field, telling you whether this field is customized or inherits its value from its parent context. Here is how it looks like:

{{< figure src="../../img/multistore-field-dropdown.png" title="Multistore configuration form dropdown" >}}

If you are building a configuration form and you want the form to be aware of the current multistore context, then you must make your form compatible with multistore checkboxes. This is made possible thanks to [Symfony's form extensions mechanism](https://symfony.com/doc/4.4/form/create_form_type_extension.html).


## Creating a multistore compatible configuration form

{{% notice note %}}
You will find a concrete example of how a configuration form is made multistore-compatible [on this github pull-request](https://github.com/PrestaShop/PrestaShop/pull/24393).
{{% /notice %}}

A Symfony form extension called `MultistoreConfigurationTypeExtension` has been created in order to make it easy to add multistore checkboxes to a configuration form.

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

Then for each form element that should have its multistore checkbox, you must add a `multistore_configuration_key` option, with the configuration key to which it should be attached as a value:

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
                    // Here we add the multistore_configuration_key option with the configuration key it is linked to.
                    'multistore_configuration_key' => 'THE_CONFIGURATION_KEY',
                    // ...
                ]
            )
        // ...
```

Last but not least, you must make the frontend aware of these state modifications, you need to add the `MultistoreConfigField` in your javascript:

```js
window.prestashop.component.initComponents(
    [
        'MultistoreConfigField',
    ],
);
```

Doing this will have several effects:

- Each field having the `multistore_configuration_key` option will have a multistore checkbox on its left and a multistore dropdown on its right;
- Checkboxes will automatically be checked or not depending on the configuration for the current shop context;
- When the configuration value is inherited, the checkbox will be unchecked, and the field will be disabled and greyed out;
- Thanks to the javascript component, checking or unchecking a checkbox will enable/disable the field for the current shop context.


## Saving data from a multistore configuration form

When receiving the data from the form, you will also receive values from the multistore checkboxes that were added to your form:

- When a multistore checkbox is pushed unchecked, we want to delete the configuration value for the current context (so that it inherits its value from parent contexts).
- When a multistore checkbox is pushed checked, we want to save the configuration value for the current context.

When your configuration form is multistore compatible, your configuration class should extend the `AbstractMultistoreConfiguration` abstract class instead of directly implementing the `DataConfigurationInterface` interface. This will give you access to helper methods that will make it easy to store the right configuration values at the right place and for the right context.

The two helper methods are

- **`getShopConstraint()`:** this will give you a ShopConstraint object reflecting the current context or null
```php
public function getShopConstraint(): ?ShopConstraint
```
- **`updateConfigurationValue()`:** this will save or delete the configuration value for the given configuration key, and is aware of the multistore checkbox and the current shop context. Note that this helper method is fully compatible with not-multistore fields.
```php
public function updateConfigurationValue(string $configurationKey, string $fieldName, array $input, ?ShopConstraint $shopConstraint, array $options = []): void
```

As an example, see how it is used in the `MaintenanceConfiguration` class

```php
<?php

/**
 * This class loads and saves data configuration for the Maintenance page.
 */
class MaintenanceConfiguration extends AbstractMultistoreConfiguration
{

    // .... data loading doesn't change


    /**
     * {@inheritdoc}
     */
    public function updateConfiguration(array $configurationInputValues)
    {
        $shopConstraint = $this->getShopConstraint();

        // note that $configurationInputValues is an associative array where keys are field names and values are field values, it's the data coming from the form

        $this->updateConfigurationValue('PS_SHOP_ENABLE', 'enable_shop', $configurationInputValues, $shopConstraint);
        $this->updateConfigurationValue('PS_MAINTENANCE_IP', 'maintenance_ip', $configurationInputValues, $shopConstraint);
        $this->updateConfigurationValue('PS_MAINTENANCE_TEXT', 'maintenance_text', $configurationInputValues, $shopConstraint, ['html' => true]);

        return [];
    }
}
```

As you can see, by using these two helper methods you can easily store your configuration values in a multistore context.
