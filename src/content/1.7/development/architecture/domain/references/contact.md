---
title: Contact domain
---

## Contact domain

### Contact Commands

#### EditContactCommand {id="EditContactCommand"}

`PrestaShop\PrestaShop\Core\Domain\Contact\Command\EditContactCommand`
_Class EditContactCommand is responsible for editing contact data._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$contactId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Contact\CommandHandler\EditContactHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Contact\CommandHandler\EditContactHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddContactCommand {id="AddContactCommand"}

`PrestaShop\PrestaShop\Core\Domain\Contact\Command\AddContactCommand`
_Class AddContactCommand is responsible for adding the contact data._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localisedTitles`</li>  <li>`$isMessageSavingEnabled`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Contact\CommandHandler\AddContactHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Contact\CommandHandler\AddContactHandlerInterface`</li>  |
| **Return type** |  ContactId  |

### Contact Queries

#### GetContactForEditing {id="GetContactForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Contact\Query\GetContactForEditing`
_Class GetContactForEditing is responsible for getting the data related with contact entity._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$contactId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Contact\QueryHandler\GetContactForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Contact\QueryHandler\GetContactForEditingHandlerInterface`</li>  |
| **Return type** |  EditableContact  |
