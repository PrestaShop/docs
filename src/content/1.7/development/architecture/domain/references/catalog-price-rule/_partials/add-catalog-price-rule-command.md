`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\Command\AddCatalogPriceRuleCommand`
_Adds new catalog price rule with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $name`</li>  <li>`$int $currencyId`</li>  <li>`$int $countryId`</li>  <li>`$int $groupId`</li>  <li>`$int $fromQuantity`</li>  <li>`$string $reductionType`</li>  <li>`$float $reductionValue`</li>  <li>`$int $shopId`</li>  <li>`$bool $includeTax`</li>  <li>`$float $price`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CatalogPriceRule\CommandHandler\AddCatalogPriceRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\CommandHandler\AddCatalogPriceRuleHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\ValueObject\CatalogPriceRuleId`  |
