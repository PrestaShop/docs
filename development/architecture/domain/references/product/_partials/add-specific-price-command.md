`PrestaShop\PrestaShop\Core\Domain\Product\SpecificPrice\Command\AddSpecificPriceCommand`
_Add specific price to a Product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $productId`</li>  <li>`$string $reductionType`</li>  <li>`$string $reductionValue`</li>  <li>`$bool $includeTax`</li>  <li>`$string $fixedPrice`</li>  <li>`$int $fromQuantity`</li>  <li>`$DateTimeInterface $dateTimeFrom`</li>  <li>`$DateTimeInterface $dateTimeTo`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\SpecificPrice\CommandHandler\AddSpecificPriceHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\SpecificPrice\CommandHandler\AddSpecificPriceHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Product\SpecificPrice\ValueObject\SpecificPriceId`  |
