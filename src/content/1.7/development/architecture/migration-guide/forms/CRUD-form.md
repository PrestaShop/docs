---
title: CRUD Form
weight: 30
---

# CRUD Form

## Introduction

These forms handle PrestaShop form to create and edit identifiable objects. In PrestaShop, many forms represent an identifiable object data such as Cart, Product, Order, Customer and many others.
Each identifiable object share common scenarios such as its creation, update or it's display. To wrap the common behavior is a must and
identifiable object is here for rescue. It allows to retrieve data for form display and to submit it by using following parts:

* _Form data provider_ - responsible for data retrieval either by identifiable object id or by providing default values.
* _Form builder_ - used for rendering form content.
* _Form data handler_ - used to handle form data after it is submitted.
* _Form handler_ - a wrapper for form data handler.

## Form data provider

Data retrieval is defined by two methods:

* **getData($id)** - function used to retrieve data by given id.

* **getDefaultData()** - used to retrieve default data.

### Creating form data provider

You don’t have to create the Form data provider by yourself but instead rely on `\PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\FormDataProviderInterface`.

```php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider;

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

We have just created a basic Form data provider usage which will pre fill our title with `Customer service` text but by default it will return `service` string. Don't forget to register it as a service because it is a part of [Form builder](#form-builder).

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_provider.yml

  prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\ContactFormDataProvider'
```

{{% notice note %}}
On real use case scenario the data can be returned from database. Have a look at our [recommended approach]({{< relref "SQRS-usage-in-forms.md" >}}) of how to do that withing the _Form data provider_.
{{% /notice %}}

## Form builder

When using form builder oyu only need to worry about passing the `Form type` and `Form data provider`.
By using these methods:

* **getForm(array $data = [], array $options = [])** - method used to retrieve form. Optional parameter `$data` and `$options` can be passed to `Symfony  Form Builder`.

* **getFormFor($id, array $data = [], array $options = [])** - method used to retrieve form by id. Same optional parameters can be used with this function.

### Using Form builder

In most cases you only need to define form builder as a service:

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_builder.yml

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

Finally, use it in your controller:

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

{{< figure src="../img/contact-form-rendered.png" title="Result of form builder" >}}

## Form data handler

Form data handler is responsible for your form data submitting and it is used by these methods:

* **create($data)** - used for creating new identifiable object.

* **update($id, $data)** - used for updating identifiable object.

### Creating form data handler

You don’t have to create the Form data handler by yourself but instead rely on `\PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\FormDataHandlerInterface`

```php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler;

final class ContactFormDataHandler implements FormDataHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        // handle creation logic here
        return 'my required data to use after identifiable object is created';
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        /** @var ContactId $contactId */
        $contactId = $this->updateContact($id, $data);

        return $contactId->getValue();
    }

    public function updateContact($id, $data)
    {
        // Identifiable object update logic goes here.
    }
}
```

After initializing `create` method there you must handle identifiable objects creation logic. You can return any data you like or no data at all - it depends on the use case where the data will be used next.
After initializing `update` method you must update your identifiable object and it must return an `int` type id.
Don't forget to register it as a service because it is a part of [Form Handler](#form-handler).

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_handler.yml

  prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\ContactFormDataHandler'
```

{{% notice note %}}
On real use case scenario the data is used to create or modify certain table in your database. Have a look at our [recommended approach]({{< relref "SQRS-usage-in-forms.md" >}}) of how to do that withing the _Form data handler_.
{{% /notice %}}

## Form handler

Form handler is used to encapsulate the `Form data handler`. It has methods:

* **handle(FormInterface $form)** - handles form by creating new identifiable object.
* **handleFor($id, FormInterface $form)** - handles form for given object.

### Using form handler

In most cases you only need to define form handler as a service:

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_handler.yml

  prestashop.core.form.identifiable_object.handler.contact_form_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Handler\FormHandler'
    factory: 'prestashop.core.form.identifiable_object.handler.form_handler_factory:create'
    arguments:
      - '@prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler'
```

and to use it in your controller like this:

```php
    public function editAction($contactId, Request $request)
    {
        $contactFormBuilder = $this->get('prestashop.core.form.identifiable_object.builder.contact_form_builder');
        $contactForm = $contactFormBuilder->getFormFor($contactId);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted()) {
            $contactFormHandler = $this->get('prestashop.core.form.identifiable_object.handler.contact_form_handler');
            $result = $contactFormHandler->handleFor($contactId, $contactForm);

            if (null !== $result->getIdentifiableObjectId()) {
                $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));

                return $this->redirectToRoute('admin_contacts_index');
            }
        }

        return $this->render('@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/edit.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
```

First, the builder creates the form which handles current `Request`. If the form is being submitted, form handler is called and it handles our form by given `$contactId` and `$contactForm`.

## Summary as a schema

{{< figure src="../img/identifiable-object-schema-with-sqrs-domain-tier.png" title="Identifiable object schema" >}}

{{% notice note %}}
<!-- @todo: link to component of SQRS and its usage in identifiable object -->
 Note that the `Domain tier` uses [SQRS](#) which usage withing identifiable object is defined [here]({{< relref "SQRS-usage-in-forms.md" >}}).
{{% /notice %}}