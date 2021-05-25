`PrestaShop\PrestaShop\Core\Domain\Language\Command\AddLanguageCommand`
_Adds new language with given data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string $name`</li>  <li>`$string $isoCode`</li>  <li>`$string $tagIETF`</li>  <li>`$string $shortDateFormat`</li>  <li>`$string $fullDateFormat`</li>  <li>`$string $flagImagePath`</li>  <li>`$string $noPictureImagePath`</li>  <li>`$bool $isRtl`</li>  <li>`$bool $isActive`</li>  <li>`$array $shopAssociation`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\CommandHandler\AddLanguageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\CommandHandler\AddLanguageHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Language\ValueObject\LanguageId`  |
