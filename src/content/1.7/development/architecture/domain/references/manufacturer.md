---
title: Manufacturer domain
---

## Manufacturer domain

### Manufacturer Commands

#### ToggleManufacturerStatusCommand {id="ToggleManufacturerStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Command\ToggleManufacturerStatusCommand`
_Toggles manufacturer status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$manufacturerId`</li>  <li>`$expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\CommandHandler\ToggleManufacturerStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\CommandHandler\ToggleManufacturerStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkToggleManufacturerStatusCommand {id="BulkToggleManufacturerStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Command\BulkToggleManufacturerStatusCommand`
_Toggles manufacturer status in bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array manufacturerIds`</li>  <li>`$expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\CommandHandler\BulkToggleManufacturerStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\CommandHandler\BulkToggleManufacturerStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteManufacturerCommand {id="DeleteManufacturerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Command\DeleteManufacturerCommand`
_Deletes manufacturer_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$manufacturerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\CommandHandler\DeleteManufacturerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\CommandHandler\DeleteManufacturerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteManufacturerCommand {id="BulkDeleteManufacturerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Command\BulkDeleteManufacturerCommand`
_Deletes manufacturers in bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array manufacturerIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\CommandHandler\BulkDeleteManufacturerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\CommandHandler\BulkDeleteManufacturerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### EditManufacturerCommand {id="EditManufacturerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Command\EditManufacturerCommand`
_Edits manufacturer with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$manufacturerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\CommandHandler\EditManufacturerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\CommandHandler\EditManufacturerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddManufacturerCommand {id="AddManufacturerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Command\AddManufacturerCommand`
_Creates manufacturer with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$name`</li>  <li>`$enabled`</li>  <li>`$array localizedShortDescriptions`</li>  <li>`$array localizedDescriptions`</li>  <li>`$array localizedMetaTitles`</li>  <li>`$array localizedMetaDescriptions`</li>  <li>`$array localizedMetaKeywords`</li>  <li>`$array shopAssociation`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\CommandHandler\AddManufacturerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\CommandHandler\AddManufacturerHandlerInterface`</li>  |
| **Return type** |  ManufacturerId  |

### Manufacturer Queries

#### GetManufacturerForEditing {id="GetManufacturerForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Query\GetManufacturerForEditing`
_Gets manufacturer for editing in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$manufacturerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\QueryHandler\GetManufacturerForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\QueryHandler\GetManufacturerForEditingHandlerInterface`</li>  |
| **Return type** |  EditableManufacturer  |
#### GetManufacturerForViewing {id="GetManufacturerForViewing"}

`PrestaShop\PrestaShop\Core\Domain\Manufacturer\Query\GetManufacturerForViewing`
_Get manufacturer information for viewing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$manufacturerId`</li>  <li>`$languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Manufacturer\QueryHandler\GetManufacturerForViewingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Manufacturer\QueryHandler\GetManufacturerForViewingHandlerInterface`</li>  |
| **Return type** |  ViewableManufacturer  |
