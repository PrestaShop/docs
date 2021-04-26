---
title: TaxRulesGroup domain
---

## TaxRulesGroup domain

### TaxRulesGroup Commands

#### DeleteTaxRulesGroupCommand {id="DeleteTaxRulesGroupCommand"}

`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\Command\DeleteTaxRulesGroupCommand`
_Command responsible for single tax rules group deletion_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int taxRulesGroupId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\TaxRulesGroup\CommandHandler\DeleteTaxRulesGroupHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\CommandHandler\DeleteTaxRulesGroupHandlerInterface`</li>  |
| **Return type** |  void  |
#### BulkDeleteTaxRulesGroupCommand {id="BulkDeleteTaxRulesGroupCommand"}

`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\Command\BulkDeleteTaxRulesGroupCommand`
_Command responsible for multiple tax rules groups deletion_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array taxRulesGroupIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\TaxRulesGroup\CommandHandler\BulkDeleteTaxRulesGroupHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\CommandHandler\BulkDeleteTaxRulesGroupHandlerInterface`</li>  |
| **Return type** |  void  |
#### BulkSetTaxRulesGroupStatusCommand {id="BulkSetTaxRulesGroupStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\Command\BulkSetTaxRulesGroupStatusCommand`
_Command responsible for multiple tax rules groups status setting_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array taxRulesGroupIds`</li>  <li>`$bool expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\TaxRulesGroup\CommandHandler\BulkSetTaxRulesGroupStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\CommandHandler\BulkToggleTaxRulesGroupStatusHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetTaxRulesGroupStatusCommand {id="SetTaxRulesGroupStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\Command\SetTaxRulesGroupStatusCommand`
_Command for setting single tax rules group status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int taxRulesGroupId`</li>  <li>`$bool expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\TaxRulesGroup\CommandHandler\SetTaxRulesGroupStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\CommandHandler\ToggleTaxRulesGroupStatusHandlerInterface`</li>  |
| **Return type** |  void  |

### TaxRulesGroup Queries

#### GetTaxRulesGroupForEditing {id="GetTaxRulesGroupForEditing"}

`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\Query\GetTaxRulesGroupForEditing`
_Gets tax rules group for editing in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int taxRulesGroupId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\TaxRulesGroup\QueryHandler\GetTaxRulesGroupForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\TaxRulesGroup\QueryHandler\GetTaxRulesGroupForEditingHandlerInterface`</li>  |
| **Return type** |  EditableTaxRulesGroup  |
