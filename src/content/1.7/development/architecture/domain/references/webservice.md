---
title: Webservice domain
---

## Webservice domain

### Webservice Commands

#### AddWebserviceKeyCommand {id="AddWebserviceKeyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Webservice\Command\AddWebserviceKeyCommand`
_Adds new webservice key which is used to access PrestaShop&#039;s API_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$key`</li>  <li>`$description`</li>  <li>`$status`</li>  <li>`$array permissions`</li>  <li>`$array associatedShops`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Webservice\CommandHandler\AddWebserviceKeyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Webservice\CommandHandler\AddWebserviceKeyHandlerInterface`</li>  |
| **Return type** |  WebserviceKeyId  |
#### EditWebserviceKeyCommand {id="EditWebserviceKeyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Webservice\Command\EditWebserviceKeyCommand`
_Edits webservice key data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$webserviceKeyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Webservice\CommandHandler\EditWebserviceKeyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Webservice\CommandHandler\EditWebserviceKeyHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Webservice Queries

#### GetWebserviceKeyForEditing {id="GetWebserviceKeyForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Webservice\Query\GetWebserviceKeyForEditing`
_Get webservice key data for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$webserviceKeyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Webservice\QueryHandler\GetWebserviceKeyForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Webservice\QueryHandler\GetWebserviceKeyForEditingHandlerInterface`</li>  |
| **Return type** |  EditableWebserviceKey  |
