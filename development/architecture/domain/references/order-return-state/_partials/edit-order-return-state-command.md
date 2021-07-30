`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\Command\EditOrderReturnStateCommand`
_Edits provided order return state. It can edit either all or partial data. Only not-null values are considered when editing order return state. For example, if the name is null, then the original value is not modified, however, if name is set, then the original value will be overwritten._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderReturnStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderReturnState\CommandHandler\EditOrderReturnStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderReturnState\CommandHandler\EditOrderReturnStateHandlerInterface`</li>  |
| **Return type** |  `void`  |
