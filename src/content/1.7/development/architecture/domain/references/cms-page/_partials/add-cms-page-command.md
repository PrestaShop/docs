`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\AddCmsPageCommand`
_Adds new cms page_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int $cmsPageCategoryId`</li>  <li>`$array $localizedTitle`</li>  <li>`$array $localizedMetaTitle`</li>  <li>`$array $localizedMetaDescription`</li>  <li>`$array $LocalizedMetaKeyword`</li>  <li>`$array $localizedFriendlyUrl`</li>  <li>`$array $localizedContent`</li>  <li>`$bool $indexedForSearch`</li>  <li>`$bool $displayed`</li>  <li>`$array $shopAssociation`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\AddCmsPageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\AddCmsPageHandlerInterface`</li>  |
| **Return type** |  `PrestaShop\PrestaShop\Core\Domain\CmsPage\ValueObject\CmsPageId`  |
