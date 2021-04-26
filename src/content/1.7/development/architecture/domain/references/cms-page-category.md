---
title: CmsPageCategory domain
---

## CmsPageCategory domain

### CmsPageCategory Commands

#### DeleteCmsPageCategoryCommand {id="DeleteCmsPageCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Command\DeleteCmsPageCategoryCommand`
_Class DeleteCmsPageCategoryCommand is responsible for deleting cms page category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageCategoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\CommandHandler\DeleteCmsPageCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\CommandHandler\DeleteCmsPageCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ToggleCmsPageCategoryStatusCommand {id="ToggleCmsPageCategoryStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Command\ToggleCmsPageCategoryStatusCommand`
_Class ToggleCmsPageCategoryStatusCommand is responsible for turning on and off cms page category status._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageCategoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\CommandHandler\ToggleCmsPageCategoryStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\CommandHandler\ToggleCmsPageCategoryStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteCmsPageCategoryCommand {id="BulkDeleteCmsPageCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Command\BulkDeleteCmsPageCategoryCommand`
_Class BulkDeleteCmsPageCategoryCommand is responsible for deleting multiple cms page categories._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cmsPageCategoryIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\CommandHandler\BulkDeleteCmsPageCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\CommandHandler\BulkDeleteCmsPageCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkEnableCmsPageCategoryCommand {id="BulkEnableCmsPageCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Command\BulkEnableCmsPageCategoryCommand`
_Class BulkEnableCmsPageCategoryCommand is responsible for enabling cms category pages._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cmsPageCategoryIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\CommandHandler\BulkEnableCmsPageCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\CommandHandler\BulkEnableCmsPageCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDisableCmsPageCategoryCommand {id="BulkDisableCmsPageCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Command\BulkDisableCmsPageCategoryCommand`
_Class BulkDisableCmsPageCategoryCommand is responsible for disabling cms category pages._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cmsPageCategoryIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\CommandHandler\BulkDisableCmsPageCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\CommandHandler\BulkDisableCmsPageCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCmsPageCategoryCommand {id="AddCmsPageCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Command\AddCmsPageCategoryCommand`
_Class AddCmsPageCategoryCommand is responsible for adding cms page category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localisedName`</li>  <li>`$array localisedFriendlyUrl`</li>  <li>`$parentId`</li>  <li>`$isDisplayed`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\CommandHandler\AddCmsPageCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\CommandHandler\AddCmsPageCategoryHandlerInterface`</li>  |
| **Return type** |  CmsPageCategoryId  |
#### EditCmsPageCategoryCommand {id="EditCmsPageCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Command\EditCmsPageCategoryCommand`
_Edits cms page category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageCategoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\CommandHandler\EditCmsPageCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\CommandHandler\EditCmsPageCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |

### CmsPageCategory Queries

#### GetCmsPageCategoriesForBreadcrumb {id="GetCmsPageCategoriesForBreadcrumb"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Query\GetCmsPageCategoriesForBreadcrumb`
_Class GetCmsPageCategoriesForBreadcrumb is responsible for providing required data for displaying cms page category breadcrumbs._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$currentCategoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\QueryHandler\GetCmsPageCategoriesForBreadcrumbHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\QueryHandler\GetCmsPageCategoriesForBreadcrumbHandlerInterface`</li>  |
| **Return type** |  Breadcrumb  |
#### GetCmsPageParentCategoryIdForRedirection {id="GetCmsPageParentCategoryIdForRedirection"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Query\GetCmsPageParentCategoryIdForRedirection`
_Class GetCmsPageParentCategoryIdForRedirection is responsible for providing cms page categories parent id for redirecting to the right controller after create, edit, delete, toggle actions._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageCategoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\QueryHandler\GetCmsPageParentCategoryIdForRedirectionHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\QueryHandler\GetCmsPageParentCategoryIdForRedirectionHandlerInterface`</li>  |
| **Return type** |  CmsPageCategoryId  |
#### GetCmsPageCategoryForEditing {id="GetCmsPageCategoryForEditing"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Query\GetCmsPageCategoryForEditing`
_Class GetCmsPageCategoryForEditing is responsible for retrieving cms page category form data._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$cmsPageCategoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\QueryHandler\GetCmsPageCategoryForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\QueryHandler\GetCmsPageCategoryForEditingHandlerInterface`</li>  |
| **Return type** |  EditableCmsPageCategory  |
#### GetCmsPageCategoryNameForListing {id="GetCmsPageCategoryNameForListing"}

`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\Query\GetCmsPageCategoryNameForListing`
_Gets name by cms category which are used for display in cms listing._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CMS\PageCategory\QueryHandler\GetCmsPageCategoryNameForListingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CmsPageCategory\QueryHandler\GetCmsPageCategoryNameForListingHandlerInterface`</li>  |
| **Return type** |  string  |
