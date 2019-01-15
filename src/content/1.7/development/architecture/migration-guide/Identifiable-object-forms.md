---
title: Identifiable object Forms
weight: 30
---

# Identifiable object Forms

## Introduction

In PrestaShop, many forms represent an identifiable object data such as Cart, Product, Order, Customer and many others.
Each indentifiable object share common scenarios such as its creation, update or it's display. To wrap the common behavior is a must and
identifiable object is here for rescue. It allows to retrieve data for form display and to submit it by using following parts:

* _Form data provider_ - responsible for data retrieval either by identifiable object id or by providing default values.
* _Form builder_ - used for rendering form content.

## Form data provider

Data retrieval is defined by two methods:

* **getData($id)** - function used to retrieve data by given id.

* **getDefaultData()** - used to retrieve default data.

### Creating form data provider

You don’t have to create the Form data provider by yourself but instead rely on `\PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\FormDataProviderInterface`.

```php
final class ContactFormDataProvider implements FormDataProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getData($contactId)
    {
        return $this->getDataByContactId($contactId);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultData()
    {
        return [
            'title' => 'service',
        ];
    }

    /**
     * Data which is being retrieved by contact id.
     *
     * @param int $contactId
     *
     * @return array
     */
    private function getDataByContactId($contactId)
    {
        return [
            'title' => 'Customer service',
        ];
    }
}
```

We have just created a basic Form data provider usage which will prefill our title with `Customer service` text but by default it will return `service` string.

## Form Builder

When using form builder oyu only need to worry about passing the `Form type` and `Form data provider`.
By using these methods:

* **getForm(array $data = [], array $options = [])** - method used to retrieve form. Optional parameter `$data` and `$options` can be passed to `Symfony  Form Builder`.

* **getFormFor($id, array $data = [], array $options = [])** - method used to retrieve form by id. Same optional parameters can be used with this function.

### Using Form builder

In most cases you only need to define form builder as a service:

```yaml
  prestashop.core.form.identifiable_object.builder.contact_form_builder:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Builder\FormBuilder'
    factory: 'prestashop.core.form.builder.form_builder_factory:create'
    arguments:
      - 'PrestaShopBundle\Form\Admin\Configure\ShopParameters\Contact\ContactType'
      - '@prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider'
```

{{% notice note %}}
 Make sure you pass your form type as a string.
{{% /notice %}}

Finally, use it in your controller like this:

```php
    public function editAction($contactId)
    {
        $contactFormBuilder = $this->get('prestashop.core.form.identifiable_object.builder.contact_form_builder');
        $contactForm = $contactFormBuilder->getFormFor($contactId);

        return $this->render('@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/edit.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
```

and the result with some common twig structure applied for identifiable object form pages looks like this:

{{< figure src="../../../img/contact-form-rendered.png" title="Result of form builder" >}}  