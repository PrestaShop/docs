`PrestaShop\PrestaShop\Core\Domain\Address\Command\EditOrderAddressCommand`
_Class EditOrderAddressCommand used to edit an order address and then update the related field so that it uses the new duplicated address._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $orderId`</li>  <li>`$string $addressType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\EditOrderAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\EditOrderAddressHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Address\ValueObject\AddressId`  |
