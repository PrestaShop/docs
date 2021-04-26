---
title: Feature domain
---

## Feature domain

### Feature Commands

#### AddFeatureCommand {id="AddFeatureCommand"}

`PrestaShop\PrestaShop\Core\Domain\Feature\Command\AddFeatureCommand`
_Adds new feature_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$array shopAssociation = array (
)`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Feature\CommandHandler\AddFeatureHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Feature\CommandHandler\AddFeatureHandlerInterface`</li>  |
| **Return type** |  FeatureId id of the created feature  |
#### EditFeatureCommand {id="EditFeatureCommand"}

`PrestaShop\PrestaShop\Core\Domain\Feature\Command\EditFeatureCommand`
_Edit feature with given data._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$featureId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Feature\CommandHandler\EditFeatureHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Feature\CommandHandler\EditFeatureHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Feature Queries

#### GetFeatureForEditing {id="GetFeatureForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Feature\Query\GetFeatureForEditing`
_Retrieves feature data for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$featureId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Feature\QueryHandler\GetFeatureForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Feature\QueryHandler\GetFeatureForEditingHandlerInterface`</li>  |
| **Return type** |  EditableFeature  |
