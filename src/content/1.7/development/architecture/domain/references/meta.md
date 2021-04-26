---
title: Meta domain
---

## Meta domain

### Meta Commands

#### AddMetaCommand {id="AddMetaCommand"}

`PrestaShop\PrestaShop\Core\Domain\Meta\Command\AddMetaCommand`
_Class AddMetaCommand is responsible for saving meta entities data._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$pageName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Meta\CommandHandler\AddMetaHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Meta\CommandHandler\AddMetaHandlerInterface`</li>  |
| **Return type** |  MetaId  |
#### EditMetaCommand {id="EditMetaCommand"}

`PrestaShop\PrestaShop\Core\Domain\Meta\Command\EditMetaCommand`
_Class EditMetaCommand_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$metaId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Meta\CommandHandler\EditMetaHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Meta\CommandHandler\EditMetaHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Meta Queries

#### GetMetaForEditing {id="GetMetaForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Meta\Query\GetMetaForEditing`
_Class GetMetaForEditing is responsible for providing required data for GetMetaForEditingHandler to return meta data._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$metaId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Meta\QueryHandler\GetMetaForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Meta\QueryHandler\GetMetaForEditingHandlerInterface`</li>  |
| **Return type** |  EditableMeta  |
#### GetPagesForLayoutCustomization {id="GetPagesForLayoutCustomization"}

`PrestaShop\PrestaShop\Core\Domain\Meta\Query\GetPagesForLayoutCustomization`
_Gets pages for which theme&#039;s layout can be customized._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Meta\QueryHandler\GetPagesForLayoutCustomizationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Meta\QueryHandler\GetPagesForLayoutCustomizationHandlerInterface`</li>  |
| **Return type** |  not defined  |
