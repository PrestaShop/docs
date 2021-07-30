`PrestaShop\PrestaShop\Core\Domain\Order\Product\Command\AddProductToOrderCommand`
_Adds product to an existing order._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$int $productId`</li>  <li>`$int $combinationId`</li>  <li>`$string $productPriceTaxIncluded`</li>  <li>`$string $productPriceTaxExcluded`</li>  <li>`$int $productQuantity`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Order\CommandHandler\AddProductToOrderHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Order\Product\CommandHandler\AddProductToOrderHandlerInterface`</li>  |
| **Return type** |  `void`  |
