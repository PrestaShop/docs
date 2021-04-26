---
title: CmsPage domain
---

## CmsPage domain

### CmsPage Commands

#### BulkDisableCmsPageCommand {id="BulkDisableCmsPageCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\BulkDisableCmsPageCommand`
_Disables multiple cms pages._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cmsPageIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\BulkDisableCmsPageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\BulkDisableCmsPageHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkEnableCmsPageCommand {id="BulkEnableCmsPageCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\BulkEnableCmsPageCommand`
_Enables multiple cms pages._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cmsPageIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\BulkEnableCmsPageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\BulkEnableCmsPageHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ToggleCmsPageStatusCommand {id="ToggleCmsPageStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\ToggleCmsPageStatusCommand`
_Changes the status of cms page._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\ToggleCmsPageStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\ToggleCmsPageStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteCmsPageCommand {id="DeleteCmsPageCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\DeleteCmsPageCommand`
_Deletes given cms page._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\DeleteCmsPageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\DeleteCmsPageHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteCmsPageCommand {id="BulkDeleteCmsPageCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\BulkDeleteCmsPageCommand`
_Deletes multiple cms pages according to given array._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cmsPageIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\BulkDeleteCmsPageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\BulkDeleteCmsPageHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCmsPageCommand {id="AddCmsPageCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\AddCmsPageCommand`
_Adds new cms page_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageCategoryId`</li>  <li>`$array localizedTitle`</li>  <li>`$array localizedMetaTitle`</li>  <li>`$array localizedMetaDescription`</li>  <li>`$array LocalizedMetaKeyword`</li>  <li>`$array localizedFriendlyUrl`</li>  <li>`$array localizedContent`</li>  <li>`$indexedForSearch`</li>  <li>`$displayed`</li>  <li>`$array shopAssociation`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\AddCmsPageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\AddCmsPageHandlerInterface`</li>  |
| **Return type** |  CmsPageId  |
#### EditCmsPageCommand {id="EditCmsPageCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Command\EditCmsPageCommand`
_Edits cms page_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\CommandHandler\EditCmsPageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\CommandHandler\EditCmsPageHandlerInterface`</li>  |
| **Return type** |  not defined  |

### CmsPage Queries

#### GetCmsCategoryIdForRedirection {id="GetCmsCategoryIdForRedirection"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Query\GetCmsCategoryIdForRedirection`
_This class is used for getting the id which is used later on to redirect to the right page after certain controller actions._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\QueryHandler\GetCmsCategoryIdForRedirectionHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\QueryHandler\GetCmsCategoryIdHandlerForRedirectionInterface`</li>  |
| **Return type** |  CmsPageCategoryId  |
#### GetCmsPageForEditing {id="GetCmsPageForEditing"}

`PrestaShop\PrestaShop\Core\Domain\CmsPage\Query\GetCmsPageForEditing`
_Gets object which transfers cms page data for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\Page\QueryHandler\GetCmsPageForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPage\QueryHandler\GetCmsPageForEditingHandlerInterface`</li>  |
| **Return type** |  EditableCmsPage  |
