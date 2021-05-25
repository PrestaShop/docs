`PrestaShop\PrestaShop\Core\Domain\Address\Command\AddManufacturerAddressCommand`
_Adds new address_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $lastName`</li>  <li>`$string $firstName`</li>  <li>`$string $address`</li>  <li>`$int|null $countryId`</li>  <li>`$string $city`</li>  <li>`$?int $manufacturerId = NULL`</li>  <li>`$?string $address2 = NULL`</li>  <li>`$?string $postCode = NULL`</li>  <li>`$?int $stateId = NULL`</li>  <li>`$?string $homePhone = NULL`</li>  <li>`$?string $mobilePhone = NULL`</li>  <li>`$?string $other = NULL`</li>  <li>`$?string $dni = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\AddManufacturerAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\AddManufacturerAddressHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Address\ValueObject\AddressId`  |
