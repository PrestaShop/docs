`PrestaShop\PrestaShop\Core\Domain\Employee\Command\AddEmployeeCommand`
_Adds new employee with given data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $firstName`</li>  <li>`$string $lastName`</li>  <li>`$string $email`</li>  <li>`$string $plainPassword`</li>  <li>`$int $defaultPageId`</li>  <li>`$int $languageId`</li>  <li>`$bool $active`</li>  <li>`$int $profileId`</li>  <li>`$array $shopAssociation`</li>  <li>`$bool $hasEnabledGravatar = false`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\CommandHandler\AddEmployeeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\CommandHandler\AddEmployeeHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Employee\ValueObject\EmployeeId`  |
