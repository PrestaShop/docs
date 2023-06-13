`PrestaShop\PrestaShop\Core\Domain\Product\Command\BulkUpdateProductStatusCommand`
_Deletes multiple products_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array $productIds`</li>  <li>`$bool $newStatus`</li>  <li>`$PrestaShop\PrestaShop\Core\Domain\Shop\ValueObject\ShopConstraint $shopConstraint`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\BulkUpdateProductStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\BulkUpdateProductStatusHandlerInterface`</li>  |
| **Return type** |  `void`  |
