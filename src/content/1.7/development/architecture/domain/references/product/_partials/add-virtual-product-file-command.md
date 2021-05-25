`PrestaShop\PrestaShop\Core\Domain\Product\VirtualProductFile\Command\AddVirtualProductFileCommand`
_Adds downloadable file for virtual product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $productId`</li>  <li>`$string $filePath`</li>  <li>`$string $displayName`</li>  <li>`$?int $accessDays = NULL`</li>  <li>`$?int $downloadTimesLimit = NULL`</li>  <li>`$?DateTimeInterface $expirationDate = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Product\VirtualProduct\CommandHandler\AddVirtualProductFileHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Product\VirtualProductFile\CommandHandler\AddVirtualProductFileHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Product\VirtualProductFile\ValueObject\VirtualProductFileId`  |
