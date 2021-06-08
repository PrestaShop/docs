`PrestaShop\PrestaShop\Core\Domain\CustomerMessage\Command\AddOrderCustomerMessageCommand`
_This command adds/sends message to the customer related with the order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$string $message`</li>  <li>`$bool $isPrivate`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CustomerService\CommandHandler\AddOrderCustomerMessageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CustomerMessage\CommandHandler\AddOrderCustomerMessageHandlerInterface`</li>  |
| **Return type** |  `void`  |
