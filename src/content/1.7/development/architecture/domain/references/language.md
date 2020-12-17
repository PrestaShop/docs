---
title: Language domain
---

## Language domain

### Language Commands

#### AddLanguageCommand {id="AddLanguageCommand"}

`PrestaShop\PrestaShop\Core\Domain\Language\Command\AddLanguageCommand`
_Adds new language with given data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$name`</li>  <li>`$isoCode`</li>  <li>`$tagIETF`</li>  <li>`$shortDateFormat`</li>  <li>`$fullDateFormat`</li>  <li>`$flagImagePath`</li>  <li>`$noPictureImagePath`</li>  <li>`$isRtl`</li>  <li>`$isActive`</li>  <li>`$array shopAssociation`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\CommandHandler\AddLanguageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\CommandHandler\AddLanguageHandlerInterface`</li>  |
| **Return type** |  LanguageId Added language&#039;s identity  |
#### EditLanguageCommand {id="EditLanguageCommand"}

`PrestaShop\PrestaShop\Core\Domain\Language\Command\EditLanguageCommand`
_Edits given language with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\CommandHandler\EditLanguageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\CommandHandler\EditLanguageHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ToggleLanguageStatusCommand {id="ToggleLanguageStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Language\Command\ToggleLanguageStatusCommand`
_Enables or disables language based in given status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$languageId`</li>  <li>`$expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\CommandHandler\ToggleLanguageStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\CommandHandler\ToggleLanguageStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkToggleLanguagesStatusCommand {id="BulkToggleLanguagesStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Language\Command\BulkToggleLanguagesStatusCommand`
_Enables/disables languages status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array languageIds`</li>  <li>`$expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\CommandHandler\BulkToggleLanguagesStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\CommandHandler\BulkToggleLanguagesStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteLanguagesCommand {id="BulkDeleteLanguagesCommand"}

`PrestaShop\PrestaShop\Core\Domain\Language\Command\BulkDeleteLanguagesCommand`
_Deletes given languages_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array languageIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\CommandHandler\BulkDeleteLanguagesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\CommandHandler\BulkDeleteLanguagesHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteLanguageCommand {id="DeleteLanguageCommand"}

`PrestaShop\PrestaShop\Core\Domain\Language\Command\DeleteLanguageCommand`
_Deletes given languages_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\CommandHandler\DeleteLanguageHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\CommandHandler\DeleteLanguageHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Language Queries

#### GetLanguageForEditing {id="GetLanguageForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Language\Query\GetLanguageForEditing`
_Gets language for editing in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Language\QueryHandler\GetLanguageForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Language\QueryHandler\GetLanguageForEditingHandlerInterface`</li>  |
| **Return type** |  EditableLanguage  |
