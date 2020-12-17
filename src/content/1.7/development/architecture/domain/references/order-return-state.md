---
title: OrderReturnState domain
---

## OrderReturnState domain

### OrderReturnState Commands

#### AddOrderReturnStateCommand {id="AddOrderReturnStateCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\Command\AddOrderReturnStateCommand`
_Adds new order return state with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$string color`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderReturnState\CommandHandler\AddOrderReturnStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\CommandHandler\AddOrderReturnStateHandlerInterface`</li>  |
| **Return type** |  OrderReturnStateId  |
#### EditOrderReturnStateCommand {id="EditOrderReturnStateCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\Command\EditOrderReturnStateCommand`
_Edits provided order return state. It can edit either all or partial data. Only not-null values are considered when editing order return state. For example, if the name is null, then the original value is not modified, however, if name is set, then the original value will be overwritten._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderReturnStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderReturnState\CommandHandler\EditOrderReturnStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\CommandHandler\EditOrderReturnStateHandlerInterface`</li>  |
| **Return type** |  not defined  |

### OrderReturnState Queries

#### GetOrderReturnStateForEditing {id="GetOrderReturnStateForEditing"}

`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\Query\GetOrderReturnStateForEditing`
_Gets order return state information for editing._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderReturnStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderReturnState\QueryHandler\GetOrderReturnStateForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\QueryHandler\GetOrderReturnStateForEditingHandlerInterface`</li>  |
| **Return type** |  EditableOrderReturnState  |
