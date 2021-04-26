---
title: Supplier domain
---

## Supplier domain

### Supplier Commands

#### ToggleSupplierStatusCommand {id="ToggleSupplierStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\ToggleSupplierStatusCommand`
_Class ToggleSupplierStatusCommand is responsible for toggling supplier status._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$supplierId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\ToggleSupplierStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\ToggleSupplierStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteSupplierCommand {id="DeleteSupplierCommand"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\DeleteSupplierCommand`
_Class DeleteSupplierCommand is responsible for deleting the supplier._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$supplierId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\DeleteSupplierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\DeleteSupplierHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteSupplierCommand {id="BulkDeleteSupplierCommand"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\BulkDeleteSupplierCommand`
_Class BulkDeleteSupplierCommand is responsible for deleting multiple suppliers._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array supplierIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\BulkDeleteSupplierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\BulkDeleteSupplierHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDisableSupplierCommand {id="BulkDisableSupplierCommand"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\BulkDisableSupplierCommand`
_Class BulkDisableSupplierCommand is responsible for disabling multiple suppliers._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array supplierIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\BulkDisableSupplierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\BulkDisableSupplierHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkEnableSupplierCommand {id="BulkEnableSupplierCommand"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\BulkEnableSupplierCommand`
_Class BulkEnableSupplierCommand is responsible for enabling multiple suppliers._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array supplierIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\BulkEnableSupplierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\BulkEnableSupplierHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddSupplierCommand {id="AddSupplierCommand"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\AddSupplierCommand`
_Creates new supplier with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string name`</li>  <li>`$string address`</li>  <li>`$string city`</li>  <li>`$int countryId`</li>  <li>`$bool enabled`</li>  <li>`$array localizedDescriptions`</li>  <li>`$array localizedMetaTitles`</li>  <li>`$array localizedMetaDescriptions`</li>  <li>`$array localizedMetaKeywords`</li>  <li>`$array shopAssociation`</li>  <li>`$?string address2 = NULL`</li>  <li>`$?string postCode = NULL`</li>  <li>`$?int stateId = NULL`</li>  <li>`$?string phone = NULL`</li>  <li>`$?string mobilePhone = NULL`</li>  <li>`$?string dni = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\AddSupplierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\AddSupplierHandlerInterface`</li>  |
| **Return type** |  SupplierId  |
#### EditSupplierCommand {id="EditSupplierCommand"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Command\EditSupplierCommand`
_Edits supplier with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int supplierId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\CommandHandler\EditSupplierHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\CommandHandler\EditSupplierHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Supplier Queries

#### GetSupplierForViewing {id="GetSupplierForViewing"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Query\GetSupplierForViewing`
_Get supplier information for viewing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$supplierId`</li>  <li>`$languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\QueryHandler\GetSupplierForViewingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\QueryHandler\GetSupplierForViewingHandlerInterface`</li>  |
| **Return type** |  ViewableSupplier  |
#### GetSupplierForEditing {id="GetSupplierForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Supplier\Query\GetSupplierForEditing`
_Gets supplier for editing in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int supplierId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Supplier\QueryHandler\GetSupplierForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Supplier\QueryHandler\GetSupplierForEditingHandlerInterface`</li>  |
| **Return type** |  EditableSupplier  |
