`PrestaShop\PrestaShop\Core\Domain\OrderState\Command\EditOrderStateCommand`
_Edits provided order state. It can edit either all or partial data. Only not-null values are considered when editing order state. For example, if the name is null, then the original value is not modified, however, if name is set, then the original value will be overwritten._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\OrderState\CommandHandler\EditOrderStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\OrderState\CommandHandler\EditOrderStateHandlerInterface`</li>  |
| **Return type** |  `void`  |
