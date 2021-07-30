`PrestaShop\PrestaShop\Core\Domain\Cart\Command\AddCustomizationCommand`
_Adds product customization_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $cartId`</li>  <li>`$int $productId`</li>  <li>`$array $customizationValuesByFieldIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Cart\CommandHandler\AddCustomizationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Cart\CommandHandler\AddCustomizationHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Product\Customization\ValueObject\CustomizationId`  |
