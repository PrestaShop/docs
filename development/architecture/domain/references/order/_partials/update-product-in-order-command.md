`PrestaShop\PrestaShop\Core\Domain\Order\Product\Command\UpdateProductInOrderCommand`
_Updates product in given order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$int $orderDetailId`</li>  <li>`$string $priceTaxIncluded`</li>  <li>`$string $priceTaxExcluded`</li>  <li>`$int $quantity`</li>  <li>`$?int $orderInvoiceId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\UpdateProductInOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Product\CommandHandler\UpdateProductInOrderHandlerInterface`</li>  |
| **Return type** |  `void`  |
