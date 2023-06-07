`PrestaShop\PrestaShop\Core\Domain\Product\Combination\Command\UpdateCombinationCommand`
_Contains all the data needed to handle the command update. This command is only designed for the general data of combination which can be persisted in one call. It was not designed to handle the combination relations._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $combinationId`</li>  <li>`$PrestaShop\PrestaShop\Core\Domain\Shop\ValueObject\ShopConstraint $shopConstraint`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\Combination\CommandHandler\UpdateCombinationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\Combination\CommandHandler\UpdateCombinationHandlerInterface`</li>  |
| **Return type** |  `void`  |
