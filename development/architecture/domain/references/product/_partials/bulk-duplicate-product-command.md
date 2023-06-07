`PrestaShop\PrestaShop\Core\Domain\Product\Command\BulkDuplicateProductCommand`
_Deletes multiple products_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array $productIds`</li>  <li>`$PrestaShop\PrestaShop\Core\Domain\Shop\ValueObject\ShopConstraint $shopConstraint`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\BulkDuplicateProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\BulkDuplicateProductHandlerInterface`</li>  |
| **Return type** |  `array&lt;ProductId&gt;`  |
