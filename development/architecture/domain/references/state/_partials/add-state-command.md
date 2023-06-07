`PrestaShop\PrestaShop\Core\Domain\State\Command\AddStateCommand`
_Creates state with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $countryId`</li>  <li>`$int $zoneId`</li>  <li>`$string $name`</li>  <li>`$string $isoCode`</li>  <li>`$bool $active`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\State\CommandHandler\AddStateHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\State\CommandHandler\AddStateHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\State\ValueObject\StateId`  |
