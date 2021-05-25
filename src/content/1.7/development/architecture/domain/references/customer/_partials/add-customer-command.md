`PrestaShop\PrestaShop\Core\Domain\Customer\Command\AddCustomerCommand`
_Adds new customer with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $firstName`</li>  <li>`$string $lastName`</li>  <li>`$string $email`</li>  <li>`$string $password`</li>  <li>`$int $defaultGroupId`</li>  <li>`$array $groupIds`</li>  <li>`$int $shopId`</li>  <li>`$?int $genderId = NULL`</li>  <li>`$?bool $isEnabled = true`</li>  <li>`$?bool $isPartnerOffersSubscribed = false`</li>  <li>`$?string $birthday = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\AddCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\AddCustomerHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Customer\ValueObject\CustomerId`  |
