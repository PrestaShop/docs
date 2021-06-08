`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Command\AddManufacturerCommand`
_Creates manufacturer with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $name`</li>  <li>`$bool $enabled`</li>  <li>`$array $localizedShortDescriptions`</li>  <li>`$array $localizedDescriptions`</li>  <li>`$array $localizedMetaTitles`</li>  <li>`$array $localizedMetaDescriptions`</li>  <li>`$array $localizedMetaKeywords`</li>  <li>`$array $shopAssociation`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\CommandHandler\AddManufacturerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\CommandHandler\AddManufacturerHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Manufacturer\ValueObject\ManufacturerId`  |
