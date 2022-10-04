---
title: CRUD Forms
weight: 20
---

# CRUD Forms

## Introduction

In computer programming, _CRUD_ is an acronym for the four basic functions of persistent storage: **create, read, update, and delete**.

PrestaShop handles several logic objects, like Cart, Product, Order, Customer... among many others. When such objects are stored using a unique identifier, we refer to them as **identifiable objects**. 

In the Back Office, most identifiable objects are managed using forms and page listings that follow the CRUD pattern. When they do, we refer to those forms as **CRUD Forms**. 

Since CRUD forms share a lot of common behavior, PrestaShop provides a common pattern to handle them all the same way. It is based on four main elements, each responsible for a very specific task:

- A **Form Builder**, that initializes the form (using a provided [Form Type][form-types]).
- A **Form Handler**, that handles the form when it's submitted.
- A **Form Data Provider** that provides data to prefill the form as it's displayed.
- And a **Form Data Handler** that saves the submitted form data to the database.

{{% notice tip %}}
PrestaShop already provides default implementations for the first two, so in most cases you'll be able to reuse them instead of creating your own.
{{% /notice %}}

## Form Data Provider

The _Form Data Provider_ takes care of retrieving data to fill out a form. For that, it needs to implement two methods:

{{% funcdef %}}

getData(mixed $id): array
: 
  Retrieves data for an edit form, using the given id to retrieve the object's data.

getDefaultData(): array
: 
  Returns default data for a creation form.

{{% /funcdef %}}

### Creating a Form Data Provider

To create a Form data provider you must implement the following interface:

    \PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\FormDataProviderInterface 

In the example below, you can see a `ContactFormDataProvider` that queries the database (in this case, using `ObjectModel`) to retrieve data when a specific identifiable object id (in this case, `Contact`) is given, and that returns static data with defaults to use when creating a new element. 

```php
<?php
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
        
        // check that the element exists in db
        if (empty($contactObjectModel->id)) {
            throw new PrestaShopObjectNotFoundException('Object not found');
        }

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

{{% notice note %}}
**This example has been simplified for practical reasons.** 

The core actually uses the CQRS pattern to retrieve data, instead of `ObjectModel`. For more information, have a look at our recommended approach on [how to use CQRS in forms]({{< relref "CQRS-usage-in-forms" >}}).
{{% /notice %}}

Don't forget to register your class as a service, you will need it to use it with the [Form builder](#form-builder).

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_provider.yml

  prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\ContactFormDataProvider'
```

Note: if you use the above snippet of code outside of the `PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider` namespace, like in a module, you need to import the classes that come from this namespace.

Example:

```php
use PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\FormDataProviderInterface;
```

## Form Builder

The _Form Builder_ is used by controllers to build the form that will be shown to users.

{{% notice tip %}}
**PrestaShop provides a default implementation for this object.**

It should be enough for most use cases, so you don't need to create it yourself! It also allows your form to be extended by modules.
{{% /notice %}}
 
The common methods that you will be using are:

{{% funcdef %}}

getForm(array $data = [], array $options = []): FormInterface
: 
  Generates and returns the Symfony form. Additional `$data` and `$options` can be used in your form type.

getFormFor(mixed $id, array $data = [], array $options = []): FormInterface
: 
  Generates and returns the Symfony form for an editable object which already exists and can be identified. Additional `$data` and `$options` can be used in your form type.

{{% /funcdef %}}

### Using the Form Builder

In most cases, you can simply reuse the default implementation. All you need to do is declare it as a service and configure it for your form's needs, by specifying the appropriate [Form type][form-types] and [Form data provider](#form-data-provider).

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_builder.yml

prestashop.core.form.identifiable_object.builder.contact_form_builder:
  class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Builder\FormBuilder'
  factory: 'prestashop.core.form.builder.form_builder_factory:create'
  arguments:
    - 'PrestaShopBundle\Form\Admin\Configure\ShopParameters\Contact\ContactType'
    - '@prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider'
```

In the example above, we are declaring a specific service for this form based on PrestaShop's implementation of the Form Builder: 

    PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Builder\FormBuilder
  
...which is instantiated using the base factory:
 
 ```text
prestashop.core.form.builder.form_builder_factory:create
```

...using two specific arguments:

- The **Form Type**'s class name 
- The **Form Data Provider**'s service name, that we declared previously.

Finally, use it in your controller:

```php
<?php
public function createAction($contactId)
{
    $contactFormBuilder = $this->get('prestashop.core.form.identifiable_object.builder.contact_form_builder');
    $contactForm = $contactFormBuilder->getForm(); // no id as the element does not exist yet

    return $this->render('@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/create.html.twig', [
        'contactForm' => $contactForm->createView(),
    ]);
}

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

## Form Data Handler

The _Form Data Handler_ is responsible for persisting the data submitted through your form. It implements the following methods:

{{% funcdef %}}

create(array $data): mixed
: 
  Creates a new identifiable object using the provided data and returns the created object's id.

update(mixed $id, array $data): void
: 
  Updates the object identified by `$id` using the provided data

{{% /funcdef %}}

### Creating a Form Data Handler

When creating your Form Data Handler you must implement the following interface:

    \PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\FormDataHandlerInterface

In the example below, you can see a `ContactFormDataHandler` that uses `ObjectModel` to create and update an instance of `Contact`:

```php
<?php
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
     */
    public function update($id, array $data)
    {
        $contactObjectModel = new Contact(id);
        // update data to object model
        // ...
        $contactObjectModel->update();
    }
}
```

{{% notice note %}}
**This example has been simplified for practical reasons.** 

The core actually uses the CQRS pattern to retrieve data, instead of `ObjectModel`. For more information, have a look at our recommended approach on [how to use CQRS in forms]({{< relref "CQRS-usage-in-forms" >}}).
{{% /notice %}}

Don't forget to register your Form Data Handler as a service, you will need it to use it with your [Form Handler](#form-handler).

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_handler.yml

prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler:
  class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\ContactFormDataHandler'
```

Note: if you use the above snippet of code outside of the `PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler` namespace, like in a module, you need to import the classes that come from this namespace.

Example:

```php
use PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\FormDataHandlerInterface;
```

## Form Handler

The _Form Handler_ is in charge of validating, enriching and saving submitted form data, using the provided [Form Data Handler](#form-data-handler). 

{{% notice tip %}}
**PrestaShop provides a default implementation for this object.**

It should be enough for most use cases, so you don't need to create it yourself! It also allows your form to be extended by modules.
{{% /notice %}}

It provides two methods:

{{% funcdef %}}
handle(FormInterface $form): FormHandlerResultInterface
: 
  Saves form data by creating new instance of the related identifiable object.

handleFor($id, FormInterface $form): FormHandlerResultInterface
: 
  Saves form data by updating the related object identified by `$id`.
{{% /funcdef %}}

Both methods return an instance of `FormHandlerResultInterface` that provides information about the process result:

{{% funcdef %}}
isValid(): bool
: 
  Indicates whether the form contains errors or not

isSubmitted(): bool
: 
  Indicates if the form was submitted
  
getIdentifiableObjectId(): mixed
: 
  Returns the Id of the identifiable object created by the form submit, if applicable
{{% /funcdef %}}

### Using the Form Handler

Much like with the [Form Builder](#form-builder), in most cases you can reuse the default implementation by declaring it as a service and configuring it according to your form's needs:

```yaml
#src/PrestaShopBundle/Resources/config/services/core/form/form_handler.yml

prestashop.core.form.identifiable_object.handler.contact_form_handler:
  class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Handler\FormHandler'
  factory: 'prestashop.core.form.identifiable_object.handler.form_handler_factory:create'
  arguments:
    - '@prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler'
```

In the example above, we are declaring a specific service for this form handler, based on PrestaShop's implementation of the Form Handler:

```text
PrestaShop\PrestaShop\Core\Form\IdentifiableObject\Handler\FormHandler
```

...wich is instantiated using the base factory:

```text
prestashop.core.form.identifiable_object.handler.form_handler_factory:create
```

...using the **Form Data Handler** that we declared previouly.

Finally, you can use it in your controller like this:

```php
<?php
public function createAction(Request $request)
{
    $contactFormBuilder = $this->get('prestashop.core.form.identifiable_object.builder.contact_form_builder');
    $contactForm = $contactFormBuilder->getForm();
    
    $contactForm->handleRequest($request);

    $contactFormHandler = $this->get('prestashop.core.form.identifiable_object.handler.contact_form_handler');
    $result = $contactFormHandler->handle($contactForm);

    if (null !== $result->getIdentifiableObjectId()) {
        $this->addFlash('success', $this->trans('Successful creation.', 'Admin.Notifications.Success'));

        return $this->redirectToRoute('admin_contacts_index');
    }
    
    return $this->render('@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/create.html.twig', [
        'contactForm' => $contactForm->createView(),
    ]);
}

public function editAction($contactId, Request $request)
{
    $contactFormBuilder = $this->get('prestashop.core.form.identifiable_object.builder.contact_form_builder');
    // we use getFormFor() instead of getForm() since we now have an id
    $contactForm = $contactFormBuilder->getFormFor($contactId);

    $contactForm->handleRequest($request);

    $contactFormHandler = $this->get('prestashop.core.form.identifiable_object.handler.contact_form_handler');
    // we use handleFor() instead of handle() since we now have an id
    $result = $contactFormHandler->handleFor($contactId, $contactForm);

    if ($result->isSubmitted() && $result->isValid()) {
        $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));

        return $this->redirectToRoute('admin_contacts_index');
    }

    return $this->render('@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/edit.html.twig', [
        'contactForm' => $contactForm->createView(),
    ]);
}
```

Let's analyze the `create` flow in the example above.

First, we create the form using the FormBuilder:

```php
<?php
$contactFormBuilder = $this->get('prestashop.core.form.identifiable_object.builder.contact_form_builder');
$contactForm = $contactFormBuilder->getForm();
```

Then, we merge the form's data with the one from the `Request` (if submitted):

```php
<?php
$contactForm->handleRequest($request);
```

Afterwards, we process the form (this will save the form in case it was sent, and do nothing otherwise), and save the result of the process for further analysis:

```php
<?php
$contactFormHandler = $this->get('prestashop.core.form.identifiable_object.handler.contact_form_handler');
$result = $contactFormHandler->handle($contactForm);
```

Now, if the form was actually saved and everything went well, we can show a success message and redirect to the listing page:

```php
<?php
if (null !== $result->getIdentifiableObjectId()) {
    $this->addFlash('success', $this->trans('Successful creation.', 'Admin.Notifications.Success'));

    return $this->redirectToRoute('admin_contacts_index');
}
```

Finally, if the form wasn't submit or if something went wrong, we just show the form.

```php
<?php
return $this->render('@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/create.html.twig', [
    'contactForm' => $contactForm->createView(),
]);
```

The `edit` flow works exactly the same, with minimal changes:

```diff
-$contactFormBuilder->getForm();
+$contactFormBuilder->getFormFor($contactId);
```

and

```diff
-$contactFormHandler->handle($contactForm);
+$contactFormHandler->handleFor($contactId, $contactForm);
```

{{% notice note %}}
**This example has been simplified for practical reasons.** 

The core actually uses CQRS to handle data persistence, which raises a `DomainException` in case of a constraint error (for example, if the identifiable object you are trying to edit doesn't exist). This is handled in the controller by wrapping the code in a try-catch block, then flashing an error message accordingly.

For more details, check out the [ContactsController source code on GitHub](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ContactsController.php).
{{% /notice %}}


## Summary as a schema

The following schema depicts the complete form flow, including the `Domain tier` which uses the CQRS pattern. [Learn more about it here]({{< relref "CQRS-usage-in-forms" >}}).

{{< figure src="../img/identifiable-object-schema-with-cqrs-domain-tier.png" title="Identifiable object forms schema" >}}


[form-types]: {{< relref "./#form-types" >}}
