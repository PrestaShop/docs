`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\AddSupplierCommand`
_Creates new supplier with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $name`</li>  <li>`$string $address`</li>  <li>`$string $city`</li>  <li>`$int $countryId`</li>  <li>`$bool $enabled`</li>  <li>`$array $localizedDescriptions`</li>  <li>`$array $localizedMetaTitles`</li>  <li>`$array $localizedMetaDescriptions`</li>  <li>`$array $localizedMetaKeywords`</li>  <li>`$array $shopAssociation`</li>  <li>`$?string $address2 = NULL`</li>  <li>`$?string $postCode = NULL`</li>  <li>`$?int $stateId = NULL`</li>  <li>`$?string $phone = NULL`</li>  <li>`$?string $mobilePhone = NULL`</li>  <li>`$?string $dni = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\AddSupplierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\AddSupplierHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Supplier\ValueObject\SupplierId`  |
