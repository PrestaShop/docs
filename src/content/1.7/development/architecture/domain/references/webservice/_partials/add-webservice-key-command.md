`PrestaShop\PrestaShop\Core\Domain\Webservice\Command\AddWebserviceKeyCommand`
_Adds new webservice key which is used to access PrestaShop&#039;s API_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $key`</li>  <li>`$string $description`</li>  <li>`$bool $status`</li>  <li>`$array $permissions`</li>  <li>`$array $associatedShops`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Webservice\CommandHandler\AddWebserviceKeyHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Webservice\CommandHandler\AddWebserviceKeyHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Webservice\ValueObject\WebserviceKeyId`  |
