---
title: CatalogPriceRule domain
---

## CatalogPriceRule domain

### CatalogPriceRule Commands

#### DeleteCatalogPriceRuleCommand {id="DeleteCatalogPriceRuleCommand"}

`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\Command\DeleteCatalogPriceRuleCommand`
_Deletes catalog price rule_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$catalogPriceRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CatalogPriceRule\CommandHandler\DeleteCatalogPriceRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\CommandHandler\DeleteCatalogPriceRuleHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteCatalogPriceRuleCommand {id="BulkDeleteCatalogPriceRuleCommand"}

`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\Command\BulkDeleteCatalogPriceRuleCommand`
_Deletes catalog price rules in bulk acton_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array catalogPriceRuleIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CatalogPriceRule\CommandHandler\BulkDeleteCatalogPriceRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\CommandHandler\BulkDeleteCatalogPriceRuleHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCatalogPriceRuleCommand {id="AddCatalogPriceRuleCommand"}

`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\Command\AddCatalogPriceRuleCommand`
_Adds new catalog price rule with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string name`</li>  <li>`$int currencyId`</li>  <li>`$int countryId`</li>  <li>`$int groupId`</li>  <li>`$int fromQuantity`</li>  <li>`$string reductionType`</li>  <li>`$float reductionValue`</li>  <li>`$int shopId`</li>  <li>`$bool includeTax`</li>  <li>`$float price`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CatalogPriceRule\CommandHandler\AddCatalogPriceRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\CommandHandler\AddCatalogPriceRuleHandlerInterface`</li>  |
| **Return type** |  CatalogPriceRuleId  |
#### EditCatalogPriceRuleCommand {id="EditCatalogPriceRuleCommand"}

`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\Command\EditCatalogPriceRuleCommand`
_Edits catalog price rule with given data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int catalogPriceRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CatalogPriceRule\CommandHandler\EditCatalogPriceRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\CommandHandler\EditCatalogPriceRuleHandlerInterface`</li>  |
| **Return type** |  not defined  |

### CatalogPriceRule Queries

#### GetCatalogPriceRuleForEditing {id="GetCatalogPriceRuleForEditing"}

`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\Query\GetCatalogPriceRuleForEditing`
_Provides data transfer object for editing CatalogPriceRule_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$catalogPriceRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CatalogPriceRule\QueryHandler\GetCatalogPriceRuleForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CatalogPriceRule\QueryHandler\GetCatalogPriceRuleForEditingHandlerInterface`</li>  |
| **Return type** |  EditableCatalogPriceRule  |
