---
title: Category domain
---

## Category domain

### Category Commands

#### BulkDisableCategoriesCommand {id="BulkDisableCategoriesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\BulkDisableCategoriesCommand`
_Class DisableCategoriesCommand disables provided categories._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array categoryIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\BulkUpdateCategoriesStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\BulkUpdateCategoriesStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### SetCategoryIsEnabledCommand {id="SetCategoryIsEnabledCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\SetCategoryIsEnabledCommand`
_Class ToggleCategoryStatusCommand toggles given category status._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li>  <li>`$isEnabled`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\SetCategoryIsEnabledHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\SetCategoryIsEnabledHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteCategoryCommand {id="DeleteCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\DeleteCategoryCommand`
_Class DeleteCategoryCommand deletes provided category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li>  <li>`$mode`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\DeleteCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\DeleteCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteCategoriesCommand {id="BulkDeleteCategoriesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\BulkDeleteCategoriesCommand`
_Class BulkDeleteCategoriesCommand._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array categoryIds`</li>  <li>`$deleteMode`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\BulkDeleteCategoriesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\BulkDeleteCategoriesHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCategoryCommand {id="AddCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\AddCategoryCommand`
_Class AddCategoryCommand adds new category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$array localizedLinkRewrites`</li>  <li>`$isActive`</li>  <li>`$parentCategoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\AddCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\AddCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddRootCategoryCommand {id="AddRootCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\AddRootCategoryCommand`
_Class AddRootCategoryCommand adds new root category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array name`</li>  <li>`$array linkRewrite`</li>  <li>`$isActive`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\AddRootCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\AddRootCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### EditRootCategoryCommand {id="EditRootCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\EditRootCategoryCommand`
_Class EditRootCategoryCommand edits given root category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\EditRootCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\EditRootCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### EditCategoryCommand {id="EditCategoryCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\EditCategoryCommand`
_Class EditCategoryCommand edits given category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\EditCategoryHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\EditCategoryHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteCategoryCoverImageCommand {id="DeleteCategoryCoverImageCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\DeleteCategoryCoverImageCommand`
_Deletes cover image for given category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\DeleteCategoryCoverImageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\DeleteCategoryCoverImageHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteCategoryMenuThumbnailImageCommand {id="DeleteCategoryMenuThumbnailImageCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\DeleteCategoryMenuThumbnailImageCommand`
_Deletes given menu thumbnail for category._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li>  <li>`$menuThumbnailId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\DeleteCategoryMenuThumbnailImageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\DeleteCategoryMenuThumbnailImageHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### UpdateCategoryPositionCommand {id="UpdateCategoryPositionCommand"}

`PrestaShop\PrestaShop\Core\Domain\Category\Command\UpdateCategoryPositionCommand`
_Updates category position_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li>  <li>`$parentCategoryId`</li>  <li>`$way`</li>  <li>`$array positions`</li>  <li>`$foundFirst`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\CommandHandler\UpdateCategoryPositionHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\CommandHandler\UpdateCategoryPositionHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Category Queries

#### GetCategoryForEditing {id="GetCategoryForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Category\Query\GetCategoryForEditing`
_Class GetCategoryForEditing retrieves category data for editing._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\QueryHandler\GetCategoryForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\QueryHandler\GetCategoryForEditingHandlerInterface`</li>  |
| **Return type** |  EditableCategory  |
#### GetCategoryIsEnabled {id="GetCategoryIsEnabled"}

`PrestaShop\PrestaShop\Core\Domain\Category\Query\GetCategoryIsEnabled`
_Get current status (enabled/disabled) for given category._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$categoryId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Category\QueryHandler\GetCategoryIsEnabledHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Category\QueryHandler\GetCategoryIsEnabledHandlerInterface`</li>  |
| **Return type** |  bool  |
