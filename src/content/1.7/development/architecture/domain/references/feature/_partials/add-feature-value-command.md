`PrestaShop\PrestaShop\Core\Domain\Feature\Command\AddFeatureValueCommand`
_Class AddFeatureValueCommand is used to add predefined feature values (as opposed to custom values which are only assigned to a Specific product)_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $featureId`</li>  <li>`$array $localizedValues`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Feature\CommandHandler\AddFeatureValueHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Feature\CommandHandler\AddFeatureValueHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\Feature\ValueObject\FeatureValueId`  |
