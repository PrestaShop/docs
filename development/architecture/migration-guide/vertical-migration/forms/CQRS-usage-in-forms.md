---
title: CQRS usage in forms
weight: 30
---

# CQRS usage in forms

{{% notice note %}}
This article assumes that you are already familiar with CQRS and [CRUD forms]({{< relref "CRUD-forms" >}}), as this topic only demonstrates the usage of the CQRS approach.
{{% /notice %}}
 
## The basics

To use CQRS you need to:

1. Inject a `CommandBus` or `QueryBus` instance using your class constructor.
2. Create an instance of the desired `Command` or `Query`.
3. Call your command using the `CommandBus` or `QueryBus`.

## Usage examples

### Using Commands

In this example, we will be working with edition in a _Contact_ CRUD Form.

To get started, let's inject the `CommandBus` into our [Form Data Handler][form-data-handler].

```yml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_handler.yml

prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler:
  class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\ContactFormDataHandler'
  arguments:
    - '@prestashop.core.command_bus'
```

and in `ContactFormDataHandler`:

```php
<?php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler;

use PrestaShop\PrestaShop\Core\CommandBus\CommandBusInterface;

final class ContactFormDataHandler implements FormDataHandlerInterface
{
    /**
     * @var CommandBusInterface
     */
    private $commandBus;

    /**
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }
}
```

Right now the first step is completed – the Command Bus is injected in the Form Data Handler. Let's use it!

Instead of modifying the entity object directly in the _Form Data Handler's_ `update()` method, we can delegate that task to a `Command`. All we have to do is create an instance of that command using the form's `$data` and then dispatch it using the `CommandBus`.

```php
<?php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler;

use PrestaShop\PrestaShop\Core\CommandBus\CommandBusInterface;
use PrestaShop\PrestaShop\Core\Domain\Contact\Command\EditContactCommand;
use PrestaShop\PrestaShop\Core\Domain\Contact\Exception\ContactException;
use PrestaShop\PrestaShop\Core\Domain\Contact\ValueObject\ContactId;

final class ContactFormDataHandler implements FormDataHandlerInterface
{
    /**
     * @var CommandBusInterface
     */
    private $commandBus;

    /**
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ContactException
     */
    public function update($id, array $data)
    {
        $editContactCommand = (new EditContactCommand((int) $id))
            ->setLocalisedTitles($data['title'])
            ->setEmail($data['email'])
            ->setIsMessagesSavingEnabled($data['is_messages_saving_enabled'])
            ->setLocalisedDescription($data['description'])
            ->setShopAssociation(is_array($data['shop_association']) ? $data['shop_association'] : [])
        ;

        $this->commandBus->handle($editContactCommand);
    }
}
```

In the `update()` method, `EditContactCommand` is used to encapsulate the actual action of saving the form. After that, the Command Bus handles the given command (persisting the information).

#### Retrieving the created object ID

As a general rule, Commands Handlers return nothing. However, when creating a new object, the created object ID is usually determined by the database engine. How do we handle that?

In this specific case, we allow Command Handlers to return the id of the newly created object after it's inserted into the database:

```php
<?php
public function create(array $data)
{
    $addContactCommand = new AddContactCommand(
        $data['title'],
        $data['is_messages_saving_enabled']
    );
    
    $contactId = $this->commandBus->handle($addContactCommand);
    
    return $contactId->getValue();
}
```

In this example, the Command Handler for `AddContactCommand` returns a `ContactId` value object that contains the contact ID.

### Using Queries

In this example, we will be working with edition in a _Contact_ CRUD Form.

First, let's inject `QueryBus` instance into the [Form Data Provider][form-data-provider].

```yml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_provider.yml

prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider:
  class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\ContactFormDataProvider'
  arguments:
    - '@prestashop.core.query_bus'
```

and in `ContactFormDataProvider`:

```php
<?php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider;

use PrestaShop\PrestaShop\Core\CommandBus\CommandBusInterface;

final class ContactFormDataProvider implements FormDataProviderInterface
{
    /**
     * @var CommandBusInterface
     */
    private $queryBus;

    /**
     * @param CommandBusInterface $queryBus
     */
    public function __construct(CommandBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }
}
```

The first step is completed – the Query Bus is injected in the Form Data Provider. Let's use it!

Instead of retrieving the data using an SQL query or retrieving the entity data using `ObjectModel` directly in the _Form Data Provider_'s `getData()` method, we can delegate that task to a `Query`. All that we have to do is create an instance of the Query using provided `$id` and dispatch it using the `QueryBus`. The appropriate Handler will take care of retrieving the information we need and returning it in a structured form.

```php
<?php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider;

use PrestaShop\PrestaShop\Core\CommandBus\CommandBusInterface;
use PrestaShop\PrestaShop\Core\Domain\Contact\DTO\EditableContact;
use PrestaShop\PrestaShop\Core\Domain\Contact\Exception\ContactException;
use PrestaShop\PrestaShop\Core\Domain\Contact\Query\GetContactForEditing;

final class ContactFormDataProvider implements FormDataProviderInterface
{
    /**
     * @var CommandBusInterface
     */
    private $queryBus;

    /**
     * @param CommandBusInterface $queryBus
     */
    public function __construct(CommandBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ContactException
     */
    public function getData($contactId)
    {
        /** @var EditableContact $editableContact */
        $editableContact = $this->queryBus->handle(new GetContactForEditing($contactId));

        return [
            'title' => $editableContact->getLocalisedTitles(),
            'email' => $editableContact->getEmail(),
            'is_messages_saving_enabled' => $editableContact->isMessagesSavingEnabled(),
            'description' => $editableContact->getLocalisedDescription(),
            'shop_association' => $editableContact->getShopAssociation(),
        ];
    }
}
```

In the example above, the Handle to the `GetContactForEditing` query returns an instance of `EditableContact`, which is an immutable Data Transfer Object (DTO) containing all the information we need.

[form-data-handler]: {{< relref "CRUD-forms#form-data-handler" >}}
[form-data-provider]: {{< relref "CRUD-forms#form-data-provider" >}}
