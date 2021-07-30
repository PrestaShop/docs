`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\Command\AddSpecificPriceCommand`
_Adds specific price_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $productId`</li>  <li>`$string $reductionType`</li>  <li>`$float $reductionValue`</li>  <li>`$bool $includeTax`</li>  <li>`$float $price`</li>  <li>`$int $fromQuantity`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SpecificPrice\CommandHandler\AddSpecificPriceHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\CommandHandler\AddSpecificPriceHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\SpecificPrice\ValueObject\SpecificPriceId`  |
