`PrestaShop\PrestaShop\Core\Domain\Currency\Command\ToggleExchangeRateAutomatizationCommand`
_Class ToggleExchangeRateAutomatizationCommand is responsible for turning on or off the setting - if its on then in CronJobs module it creates new record with url which points to the script which is being executed at certain time of period. If the setting is off then it removes that record._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$bool $exchangeRateStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\ToggleExchangeRateAutomatizationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\ToggleExchangeRateAutomatizationHandlerInterface`</li>  |
| **Return type** |  `void`  |
