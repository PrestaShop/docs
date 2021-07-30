`PrestaShop\PrestaShop\Core\Domain\Cart\Command\AddProductToCartCommand`
_Responsible for adding product to cart_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $cartId`</li>  <li>`$int $productId`</li>  <li>`$int $quantity`</li>  <li>`$?int $combinationId = NULL`</li>  <li>`$array $customizationsByFieldIds = array (
)`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\AddProductToCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\AddProductToCartHandlerInterface`</li>  |
| **Return type** |  `void`  |
