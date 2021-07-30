`PrestaShop\PrestaShop\Core\Domain\Address\Command\EditCartAddressCommand`
_Class EditCartAddressCommand used to edit a cart address and then update the related field so that it uses the new duplicated address._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $cartId`</li>  <li>`$string $addressType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\EditCartAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\EditCartAddressHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Address\ValueObject\AddressId`  |
