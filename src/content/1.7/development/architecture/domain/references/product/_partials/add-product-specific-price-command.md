`PrestaShop\PrestaShop\Core\Domain\Product\SpecificPrice\Command\AddProductSpecificPriceCommand`
_Add specific price to a Product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $productId`</li>  <li>`$string $reductionType`</li>  <li>`$float $reductionValue`</li>  <li>`$bool $includeTax`</li>  <li>`$float $price`</li>  <li>`$int $fromQuantity`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\SpecificPrice\CommandHandler\AddProductSpecificPriceHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\SpecificPrice\CommandHandler\AddProductSpecificPriceHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\SpecificPrice\ValueObject\SpecificPriceId`  |
