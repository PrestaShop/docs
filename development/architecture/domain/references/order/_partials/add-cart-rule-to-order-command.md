`PrestaShop\PrestaShop\Core\Domain\Order\Command\AddCartRuleToOrderCommand`
_Adds cart rule to given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$string $cartRuleName`</li>  <li>`$string $cartRuleType`</li>  <li>`$string $value`</li>  <li>`$?int $orderInvoiceId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddCartRuleToOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\AddCartRuleToOrderHandlerInterface`</li>  |
| **Return type** |  `void`  |
