`PrestaShop\PrestaShop\Core\Domain\Address\Command\AddCustomerAddressCommand`
_Adds new customer address_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $customerId`</li>  <li>`$string $addressAlias`</li>  <li>`$string $firstName`</li>  <li>`$string $lastName`</li>  <li>`$string $address`</li>  <li>`$string $city`</li>  <li>`$int $countryId`</li>  <li>`$string $postcode`</li>  <li>`$?string $dni = NULL`</li>  <li>`$?string $company = NULL`</li>  <li>`$?string $vat_number = NULL`</li>  <li>`$?string $address2 = NULL`</li>  <li>`$int $id_state = 0`</li>  <li>`$?string $phone = NULL`</li>  <li>`$?string $phone_mobile = NULL`</li>  <li>`$?string $other = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\AddCustomerAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\AddCustomerAddressHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Address\ValueObject\AddressId`  |
