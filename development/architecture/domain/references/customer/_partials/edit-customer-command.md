`PrestaShop\PrestaShop\Core\Domain\Customer\Command\EditCustomerCommand`
_Edits provided customer. It can edit either all or partial data. Only not-null values are considered when editing customer. For example, if the email is null, then the original value is not modified, however, if email is set, then the original value will be overwritten._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\EditCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\EditCustomerHandlerInterface`</li>  |
| **Return type** |  `void`  |
