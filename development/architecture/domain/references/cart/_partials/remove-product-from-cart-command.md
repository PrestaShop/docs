`PrestaShop\PrestaShop\Core\Domain\Cart\Command\RemoveProductFromCartCommand`
_Removes given product from cart._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $cartId`</li>  <li>`$int $productId`</li>  <li>`$?int $combinationId = NULL`</li>  <li>`$?int $customizationId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\RemoveProductFromCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\RemoveProductFromCartHandlerInterface`</li>  |
| **Return type** |  `void`  |
