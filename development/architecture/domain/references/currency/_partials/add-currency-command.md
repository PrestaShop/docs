`PrestaShop\PrestaShop\Core\Domain\Currency\Command\AddCurrencyCommand`
_Class AddCurrencyCommand used to add an official currency_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $isoCode`</li>  <li>`$float $exchangeRate`</li>  <li>`$bool $isEnabled`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\AddOfficialCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\AddCurrencyHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Currency\ValueObject\CurrencyId`  |
