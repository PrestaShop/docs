`PrestaShop\PrestaShop\Core\Domain\Cart\Command\UpdateProductQuantityInCartCommand`
_Updates product quantity in cart Quantity given must include gift product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $cartId`</li>  <li>`$int $productId`</li>  <li>`$int $quantity`</li>  <li>`$?int $combinationId = NULL`</li>  <li>`$?int $customizationId = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\UpdateProductQuantityInCartHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\UpdateProductQuantityInCartHandlerInterface`</li>  |
| **Return type** |  `void`  |
