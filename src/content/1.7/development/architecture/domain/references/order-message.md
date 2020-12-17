---
title: OrderMessage domain
---

## OrderMessage domain

### OrderMessage Commands

#### AddOrderMessageCommand {id="AddOrderMessageCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderMessage\Command\AddOrderMessageCommand`
_Add new order message_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedName`</li>  <li>`$array localizedMessage`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderMessage\CommandHandler\AddOrderMessageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderMessage\CommandHandler\AddOrderMessageHandlerInterface`</li>  |
| **Return type** |  OrderMessageId  |
#### EditOrderMessageCommand {id="EditOrderMessageCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderMessage\Command\EditOrderMessageCommand`
_Edit given order message_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderMessageId`</li>  <li>`$?array localizedName = NULL`</li>  <li>`$?array localizedMessage = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderMessage\CommandHandler\EditOrderMessageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderMessage\CommandHandler\EditOrderMessageHandlerInterface`</li>  |
| **Return type** |  void  |
#### DeleteOrderMessageCommand {id="DeleteOrderMessageCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderMessage\Command\DeleteOrderMessageCommand`
_Delete given order message_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderMessageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderMessage\CommandHandler\DeleteOrderMessageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderMessage\CommandHandler\DeleteOrderMessageHandlerInterface`</li>  |
| **Return type** |  void  |
#### BulkDeleteOrderMessageCommand {id="BulkDeleteOrderMessageCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderMessage\Command\BulkDeleteOrderMessageCommand`
_Delete given order messages_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array orderMessageIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderMessage\CommandHandler\BulkDeleteOrderMessageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderMessage\CommandHandler\BulkDeleteOrderMessageHandlerInterface`</li>  |
| **Return type** |  void  |

### OrderMessage Queries

#### GetOrderMessageForEditing {id="GetOrderMessageForEditing"}

`PrestaShop\PrestaShop\Core\Domain\OrderMessage\Query\GetOrderMessageForEditing`
_Get order message data for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderMessageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderMessage\QueryHandler\GetOrderMessageForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderMessage\QueryHandler\GetOrderMessageForEditingHandlerInterface`</li>  |
| **Return type** |  EditableOrderMessage  |
