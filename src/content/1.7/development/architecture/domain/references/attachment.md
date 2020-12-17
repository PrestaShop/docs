---
title: Attachment domain
---

## Attachment domain

### Attachment Commands

#### DeleteAttachmentCommand {id="DeleteAttachmentCommand"}

`PrestaShop\PrestaShop\Core\Domain\Attachment\Command\DeleteAttachmentCommand`
_Delete attachment command is responsible for deleting Attachment_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int attachmentId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attachment\CommandHandler\DeleteAttachmentHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Attachment\CommandHandler\DeleteAttachmentHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteAttachmentsCommand {id="BulkDeleteAttachmentsCommand"}

`PrestaShop\PrestaShop\Core\Domain\Attachment\Command\BulkDeleteAttachmentsCommand`
_Bulk delete attachment command is responsible for deleting Attachment_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array attachmentIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attachment\CommandHandler\BulkDeleteAttachmentsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Attachment\CommandHandler\BulkDeleteAttachmentsHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### EditAttachmentCommand {id="EditAttachmentCommand"}

`PrestaShop\PrestaShop\Core\Domain\Attachment\Command\EditAttachmentCommand`
_Attachment editing command_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\Attachment\ValueObject\AttachmentId attachmentId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attachment\CommandHandler\EditAttachmentHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Attachment\CommandHandler\EditAttachmentHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddAttachmentCommand {id="AddAttachmentCommand"}

`PrestaShop\PrestaShop\Core\Domain\Attachment\Command\AddAttachmentCommand`
_Attachment creation command_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$array localizedDescriptions`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attachment\CommandHandler\AddAttachmentHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Attachment\CommandHandler\AddAttachmentHandlerInterface`</li>  |
| **Return type** |  AttachmentId  |

### Attachment Queries

#### GetAttachment {id="GetAttachment"}

`PrestaShop\PrestaShop\Core\Domain\Attachment\Query\GetAttachment`
_Get attachment query_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int attachmentId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attachment\QueryHandler\GetAttachmentHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Attachment\QueryHandler\GetAttachmentHandlerInterface`</li>  |
| **Return type** |  Attachment  |
#### GetAttachmentForEditing {id="GetAttachmentForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Attachment\Query\GetAttachmentForEditing`
_Gets attachment information for editing._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int attachmentIdValue`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attachment\QueryHandler\GetAttachmentForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Attachment\QueryHandler\GetAttachmentForEditingHandlerInterface`</li>  |
| **Return type** |  EditableAttachment  |
#### GetAttachmentInformationList {id="GetAttachmentInformationList"}

`PrestaShop\PrestaShop\Core\Domain\Attachment\Query\GetAttachmentInformationList`
_Query providing attachments information_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Attachment\QueryHandler\GetAttachmentInformationListHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Attachment\QueryHandler\GetAttachmentsForListingHandlerInterface`</li>  |
| **Return type** |  AttachmentInformation[]  |
