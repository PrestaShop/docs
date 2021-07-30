`PrestaShop\PrestaShop\Core\Domain\Order\Command\UpdateOrderShippingDetailsCommand`
_Updates shipping details for given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$int $currentOrderCarrierId`</li>  <li>`$int $newCarrierId`</li>  <li>`$?string $trackingNumber = &#039;&#039;`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\UpdateOrderShippingDetailsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\CommandHandler\UpdateOrderShippingDetailsHandlerInterface`</li>  |
| **Return type** |  `void`  |
