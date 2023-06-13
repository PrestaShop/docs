`PrestaShop\PrestaShop\Core\Domain\Country\Command\AddCountryCommand`
_Adds new zone with provided data._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array $localizedNames`</li>  <li>`$string $isoCode`</li>  <li>`$int $callPrefix`</li>  <li>`$int $defaultCurrency`</li>  <li>`$int $zoneId`</li>  <li>`$bool $needZipCode`</li>  <li>`$string $zipCodeFormat`</li>  <li>`$string $addressFormat`</li>  <li>`$bool $enabled`</li>  <li>`$bool $containsStates`</li>  <li>`$bool $needIdNumber`</li>  <li>`$bool $displayTaxLabel`</li>  <li>`$array $shopAssociation`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Country\CommandHandler\AddCountryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Country\CommandHandler\AddCountryHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Country\ValueObject\CountryId`  |
