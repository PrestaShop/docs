`PrestaShop\PrestaShop\Core\Domain\Product\Command\UpdateProductCommand`
_Contains all the data needed to handle the product update. This command is only designed for the general data of product which can be persisted in one call. It was not designed to handle the product relations._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $productId`</li>  <li>`$PrestaShop\PrestaShop\Core\Domain\Shop\ValueObject\ShopConstraint $shopConstraint`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\CommandHandler\UpdateProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\CommandHandler\UpdateProductHandlerInterface`</li>  |
| **Return type** |  `void`  |
