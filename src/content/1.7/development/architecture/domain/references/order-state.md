---
title: OrderState domain
---

## OrderState domain

### OrderState Commands

#### AddOrderStateCommand {id="AddOrderStateCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderState\Command\AddOrderStateCommand`
_Adds new order state with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$string color`</li>  <li>`$bool loggable`</li>  <li>`$bool invoice`</li>  <li>`$bool hidden`</li>  <li>`$bool sendEmail`</li>  <li>`$bool pdfInvoice`</li>  <li>`$bool pdfDelivery`</li>  <li>`$bool shipped`</li>  <li>`$bool paid`</li>  <li>`$bool delivery`</li>  <li>`$array localizedTemplates`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderState\CommandHandler\AddOrderStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderState\CommandHandler\AddOrderStateHandlerInterface`</li>  |
| **Return type** |  OrderStateId  |
#### EditOrderStateCommand {id="EditOrderStateCommand"}

`PrestaShop\PrestaShop\Core\Domain\OrderState\Command\EditOrderStateCommand`
_Edits provided order state. It can edit either all or partial data. Only not-null values are considered when editing order state. For example, if the name is null, then the original value is not modified, however, if name is set, then the original value will be overwritten._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderState\CommandHandler\EditOrderStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderState\CommandHandler\EditOrderStateHandlerInterface`</li>  |
| **Return type** |  not defined  |

### OrderState Queries

#### GetOrderStateForEditing {id="GetOrderStateForEditing"}

`PrestaShop\PrestaShop\Core\Domain\OrderState\Query\GetOrderStateForEditing`
_Gets order state information for editing._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$orderStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderState\QueryHandler\GetOrderStateForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderState\QueryHandler\GetOrderStateForEditingHandlerInterface`</li>  |
| **Return type** |  EditableOrderState  |
