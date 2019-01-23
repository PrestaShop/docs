---
title: CQRS usage in forms
weight: 40
---

# CQRS usage in forms

## Introduction

Assuming that you are already familiar with [CQRS](#) and [CRUD forms]({{< relref "CRUD-form.md" >}}) as this topic only demonstrates the usage of the CQRS approach. To apply it in your forms you need to:

1. Inject a `CommandBus` or `QueryBus` instance using your class constructor.
2. Call your command using the `CommandBus` or `QueryBus`.

## Example using command bus

To start with, lets inject a `CommandBus` to our _Form data handler_

```yml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_handler.yml

prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\ContactFormDataHandler'
    arguments:
      - '@prestashop.core.command_bus'
```

and in `ContactFormDataHandler`

```php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler;

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

Right now the first step is completed - command bus is injected in the form data handler. Lets use it!

Instead of creating new object directly in `update()` method, you can delegate it to Command. All that you have to do is create command using form `$data` and dispatch it.

```php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler;

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

        /** @var ContactId $result */
        $result = $this->commandBus->handle($editContactCommand);

        return $result->getValue();
    }
}
```

In `update` function command `EditContactCommand` is used to set all required data for further processing. After that, command bus handles given command and in the success case, it returns `ContactId` value object which is used to return contact id.

## Example using query bus

First, lets inject `QueryBus` instance.

```yml
#src/PrestaShopBundle/Resources/config/services/core/form/form_data_provider.yml

  prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider:
    class: 'PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\ContactFormDataProvider'
    arguments:
      - '@prestashop.core.query_bus'
```

and in `ContactFormDataProvider`

```php
namespace PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider;

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

The first step is completed - lets use it!

Instead of creating new object directly in `getData()` method, you can delegate it to Command. All that you have to do is create command using form `$data` and dispatch it.

```php
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