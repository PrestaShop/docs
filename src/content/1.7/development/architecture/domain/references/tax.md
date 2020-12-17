---
title: Tax domain
---

## Tax domain

### Tax Commands

#### DeleteTaxCommand {id="DeleteTaxCommand"}

`PrestaShop\PrestaShop\Core\Domain\Tax\Command\DeleteTaxCommand`
_Deletes tax_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$taxId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Tax\CommandHandler\DeleteTaxHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Tax\CommandHandler\DeleteTaxHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ToggleTaxStatusCommand {id="ToggleTaxStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Tax\Command\ToggleTaxStatusCommand`
_Toggles tax status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$taxId`</li>  <li>`$expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Tax\CommandHandler\ToggleTaxStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Tax\CommandHandler\ToggleTaxStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkToggleTaxStatusCommand {id="BulkToggleTaxStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Tax\Command\BulkToggleTaxStatusCommand`
_Toggles taxes status on bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array taxIds`</li>  <li>`$expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Tax\CommandHandler\BulkToggleTaxStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Tax\CommandHandler\BulkToggleTaxStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteTaxCommand {id="BulkDeleteTaxCommand"}

`PrestaShop\PrestaShop\Core\Domain\Tax\Command\BulkDeleteTaxCommand`
_Deletes taxes on bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array taxIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Tax\CommandHandler\BulkDeleteTaxHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Tax\CommandHandler\BulkDeleteTaxHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### EditTaxCommand {id="EditTaxCommand"}

`PrestaShop\PrestaShop\Core\Domain\Tax\Command\EditTaxCommand`
_Edits given tax with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$taxId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Tax\CommandHandler\EditTaxHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Tax\CommandHandler\EditTaxHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddTaxCommand {id="AddTaxCommand"}

`PrestaShop\PrestaShop\Core\Domain\Tax\Command\AddTaxCommand`
_Adds new tax_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$rate`</li>  <li>`$enabled`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Tax\CommandHandler\AddTaxHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Tax\CommandHandler\AddTaxHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Tax Queries

#### GetTaxForEditing {id="GetTaxForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Tax\Query\GetTaxForEditing`
_Gets tax for editing in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$taxId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Tax\QueryHandler\GetTaxForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Tax\QueryHandler\GetTaxForEditingHandlerInterface`</li>  |
| **Return type** |  EditableTax  |
