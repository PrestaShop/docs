`PrestaShop\PrestaShop\Core\Domain\Currency\Command\AddUnofficialCurrencyCommand`
_Class AddUnofficialCurrencyCommand used to add an alternative currency_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $isoCode`</li>  <li>`$float $exchangeRate`</li>  <li>`$bool $isEnabled`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\AddUnofficialCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\AddUnofficialCurrencyHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\CurrencyId`  |
