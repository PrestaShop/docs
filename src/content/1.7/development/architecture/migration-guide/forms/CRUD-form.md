---
title: CRUD Form
weight: 20
---

# CRUD Form

## Introduction

In PrestaShop, many forms represent an identifiable object data such as Cart, Product, Order, Customer and many others.
Each identifiable object share common actions such as its creation, update or it's display. To wrap the common behavior is a must and
identifiable object is here for rescue. It allows to retrieve data for form display and to submit it by using following parts:

* _Form data provider_ - provides default data (when creating object) and stored data (when updating object).
* _Form builder_ - creates identifiable object form and dispatches hook that allows form modifications.
* _Form data handler_ - handles submitted form data for both create and update actions.
* _Form handler_ - handles form (in most cases created by FormBuilder), dispatches hooks for create and update action.

## Form data provider

Data retrieval is defined by two methods:

* **getData($id)** - function used to retrieve data by given id.

* **getDefaultData()** - used to retrieve default data.

### Creating form data provider

When creating your form data provider rely on `\PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\FormDataProviderInterface`. In the example below you can see `ContactFormDataProvider` that returns static data as default and queries database for data when specific Identifiable object (e.g. Product, Cart, Customer) id is given.

```php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider;

use Contact;

final class ContactFormDataProvider implements FormDataProviderInterface
{
    /**
     * Get form data for given object with given id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getData($contactId)
    {
        $contactObjectModel = new Contact($contactId);

        return [
            'title' => $contactObjectModel->name,
        ];
    }

    /**
     * Get default form data.
     *
     * @return mixed
     */
    public function getDefaultData()
    {
        return [
            'title' => 'service',
        ];
    }
}
```

In the `getData` function `ObjectModel` is used to retrieve data by given contact id. Don't forget to register it as a service because it is a part of [Form builder](#form-builder).

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_provider.yml

  prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\ContactFormDataProvider'
```

{{% notice note %}}
PrestaShop is using CQRS pattern to retrieve data for form. Have a look at our [recommended approach]({{< relref "CQRS-usage-in-forms.md" >}}) of how to do that withing the _Form data provider_.
{{% /notice %}}

## Form builder

When using form builder PrestaShop already implements `FormBuilder` for you, all that is left to do is configure it for your needs by passing the `Form type` and `Form data provider`. The common methods that you will be using are:

* **getForm(array $data = [], array $options = [])** - method used to retrieve form. Additional `$data` and `$options` can be used in your form type.

* **getFormFor($id, array $data = [], array $options = [])** - method used to retrieve form by id. Additional `$data` and `$options` can be used in your form type.

### Using Form builder

In most cases you only need to configure form builder as a service:

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_builder.yml

  prestashop.core.form.identifiable_object.builder.contact_form_builder:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Builder\FormBuilder'
    factory: 'prestashop.core.form.builder.form_builder_factory:create'
    arguments:
      - 'PrestaShopBundle\Form\Admin\Configure\ShopParameters\Contact\ContactType'
      - '@prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider'
```

This service requires to pass form type as a string and your data provider.

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

Form that is rendered following PretaShop's UI kit should look like this:

{{< figure src="../img/contact-form-rendered.png" title="Result of form builder" >}}

## Form data handler

Form data handler is responsible for your form data submitting and it is used by these methods:

* **create($data)** - used for creating new identifiable object.

* **update($id, $data)** - used for updating identifiable object.

### Creating form data handler

When creating your form data handler rely on `\PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\FormDataHandlerInterface`

```php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler;

final class ContactFormDataHandler implements FormDataHandlerInterface
{
    /**
     * Create object from form data.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $contactObjectModel = new Contact();
        // add data to object model
        // ...
        $contactObjectModel->save();

        return $contactObjectModel->id;
    }

    /**
     * Update object with form data.
     *
     * @param int $id
     * @param array $data
     *
     * @return int ID of identifiable object
     */
    public function update($id, array $data)
    {
        $contactObjectModel = new Contact(id);
        // update data to object model
        // ...
        $contactObjectModel->update();
        
        return $contactObjectModel->id;
    }
}
```

When Form handler calls `create` method there you must handle identifiable objects creation logic. You can return any data you like or no data at all - it depends on the use case where the data will be used next.
When Form handler calls `update` method you must update your identifiable object and it must return an `int` type id.
Don't forget to register it as a service because it is a part of [Form Handler](#form-handler).

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_handler.yml

  prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\ContactFormDataHandler'
```

{{% notice note %}}
PrestaShop is using CQRS pattern to create or update data for form. Have a look at our [recommended approach]({{< relref "CQRS-usage-in-forms.md" >}}) of how to do that withing the _Form data handler_.
{{% /notice %}}

## Form handler

Form handler is used to encapsulate the `Form data handler`. It has methods:

* **handle(FormInterface $form)** - handles form by creating new identifiable object.
* **handleFor($id, FormInterface $form)** - handles form by updating identifiable object

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

        $contactFormHandler = $this->get('prestashop.core.form.identifiable_object.handler.contact_form_handler');
        $result = $contactFormHandler->handleFor($contactId, $contactForm);

        if (null !== $result->getIdentifiableObjectId()) {
            $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));

            return $this->redirectToRoute('admin_contacts_index');
        }

        return $this->render('@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/edit.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
```

First, the builder creates the form which handles current `Request`. If the form is being submitted, form handler is called and it handles our form by given `$contactId` and `$contactForm`. A `$result` relies on `PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Handler\FormHandlerResultInterface` which has following public methods:

* **isValid()** - form has been submitted but it is not valid.
* **isSubmitted()** - determines, if the form was submitted.
* **getIdentifiableObjectId()** - gets identifiable object id. Can be null if not created.

## Summary as a schema

{{< figure src="../img/identifiable-object-schema-with-cqrs-domain-tier.png" title="Identifiable object schema" >}}

{{% notice note %}}
<!-- @todo: link to component of CQRS and its usage in identifiable object -->
 Note that the `Domain tier` uses [CQRS](#) which usage withing identifiable object is defined [here]({{< relref "CQRS-usage-in-forms.md" >}}).
{{% /notice %}}