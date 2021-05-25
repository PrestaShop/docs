`PrestaShop\PrestaShop\Core\Domain\Order\Command\AddOrderFromBackOfficeCommand`
_Adds new order from given cart._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $cartId`</li>  <li>`$int $employeeId`</li>  <li>`$string $orderMessage`</li>  <li>`$string $paymentModuleName`</li>  <li>`$int $orderStateId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddOrderFromBackOfficeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\AddOrderFromBackOfficeHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Order\ValueObject\OrderId`  |
