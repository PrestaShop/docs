---
title: Currency domain
---

## Currency domain

### Currency Commands

#### ToggleCurrencyStatusCommand {id="ToggleCurrencyStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\ToggleCurrencyStatusCommand`
_Class ToggleCurrencyStatusCommand is responsible for changing the status of the currency._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$currencyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\ToggleCurrencyStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\ToggleCurrencyStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteCurrencyCommand {id="DeleteCurrencyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\DeleteCurrencyCommand`
_Class DeleteCurrencyCommand is responsible for deleting Currency._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$currencyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\DeleteCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\DeleteCurrencyHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCurrencyCommand {id="AddCurrencyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\AddCurrencyCommand`
_Class AddCurrencyCommand used to add an official currency_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$isoCode`</li>  <li>`$exchangeRate`</li>  <li>`$isEnabled`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\AddOfficialCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\AddCurrencyHandlerInterface`</li>  |
| **Return type** |  CurrencyId  |
#### AddUnofficialCurrencyCommand {id="AddUnofficialCurrencyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\AddUnofficialCurrencyCommand`
_Class AddUnofficialCurrencyCommand used to add an alternative currency_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$isoCode`</li>  <li>`$exchangeRate`</li>  <li>`$isEnabled`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\AddUnofficialCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\AddUnofficialCurrencyHandlerInterface`</li>  |
| **Return type** |  CurrencyId  |
#### EditCurrencyCommand {id="EditCurrencyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\EditCurrencyCommand`
_Class EditCurrencyCommand_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$currencyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\EditOfficialCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\EditCurrencyHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### EditUnofficialCurrencyCommand {id="EditUnofficialCurrencyCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\EditUnofficialCurrencyCommand`
__

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$currencyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\EditUnofficialCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\EditUnofficialCurrencyHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### RefreshExchangeRatesCommand {id="RefreshExchangeRatesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\RefreshExchangeRatesCommand`
_Class RefreshExchangeRatesCommand_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\RefreshExchangeRatesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\RefreshExchangeRatesHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ToggleExchangeRateAutomatizationCommand {id="ToggleExchangeRateAutomatizationCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\ToggleExchangeRateAutomatizationCommand`
_Class ToggleExchangeRateAutomatizationCommand is responsible for turning on or off the setting - if its on then in CronJobs module it creates new record with url which points to the script which is being executed at certain time of period. If the setting is off then it removes that record._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$exchangeRateStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\ToggleExchangeRateAutomatizationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\ToggleExchangeRateAutomatizationHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkToggleCurrenciesStatusCommand {id="BulkToggleCurrenciesStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\BulkToggleCurrenciesStatusCommand`
_Enables/disables currencies status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array currencyIds`</li>  <li>`$bool expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\BulkToggleCurrenciesStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\BulkToggleCurrenciesStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteCurrenciesCommand {id="BulkDeleteCurrenciesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Command\BulkDeleteCurrenciesCommand`
_Deletes given currencies_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array currencyIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\CommandHandler\BulkDeleteCurrenciesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\CommandHandler\BulkDeleteCurrenciesHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Currency Queries

#### GetCurrencyForEditing {id="GetCurrencyForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Query\GetCurrencyForEditing`
_Class GetCurrencyForEditing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$currencyId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\QueryHandler\GetCurrencyForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\QueryHandler\GetCurrencyForEditingHandlerInterface`</li>  |
| **Return type** |  \PrestaShop\PrestaShop\Core\Domain\Currency\QueryResult\EditableCurrency  |
#### GetCurrencyExchangeRate {id="GetCurrencyExchangeRate"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Query\GetCurrencyExchangeRate`
_Retrieves the exchange rate for a currency compared to the shop&#039;s default_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string isoCode`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\QueryHandler\GetCurrencyExchangeRateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\QueryHandler\GetCurrencyExchangeRateHandlerInterface`</li>  |
| **Return type** |  ExchangeRate  |
#### GetReferenceCurrency {id="GetReferenceCurrency"}

`PrestaShop\PrestaShop\Core\Domain\Currency\Query\GetReferenceCurrency`
_Get reference currency data, which are data from the unicode CLDR database, thus only official currencies have one. The result is exposed with a ReferenceCurrency object, and if the currency doesn&#039;t exist a CurrencyNotFoundException is thrown._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string isoCode`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Currency\QueryHandler\GetReferenceCurrencyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Currency\QueryHandler\GetReferenceCurrencyHandlerInterface`</li>  |
| **Return type** |  ReferenceCurrency  |
