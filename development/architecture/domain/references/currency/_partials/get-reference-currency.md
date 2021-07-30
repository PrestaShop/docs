`PrestaShop\PrestaShop\Core\Domain\Currency\Query\GetReferenceCurrency`
_Get reference currency data, which are data from the unicode CLDR database, thus only official currencies have one. The result is exposed with a ReferenceCurrency object, and if the currency doesn&#039;t exist a CurrencyNotFoundException is thrown._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $isoCode`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\QueryHandler\GetReferenceCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\QueryHandler\GetReferenceCurrencyHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Currency\QueryResult\ReferenceCurrency`  |
