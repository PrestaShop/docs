---
title: CartRule domain
---

## CartRule domain

### CartRule Commands

#### AddCartRuleCommand {id="AddCartRuleCommand"}

`PrestaShop\PrestaShop\Core\Domain\CartRule\Command\AddCartRuleCommand`
_Adds new cart rule_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li>  <li>`$bool highlightInCart`</li>  <li>`$bool allowPartialUse`</li>  <li>`$int priority`</li>  <li>`$bool isActive`</li>  <li>`$DateTime validFrom`</li>  <li>`$DateTime validTo`</li>  <li>`$int totalQuantity`</li>  <li>`$int quantityPerUser`</li>  <li>`$PrestaShop\PrestaShop\Core\Domain\CartRule\ValueObject\CartRuleAction\CartRuleActionInterface cartRuleAction`</li>  <li>`$float minimumAmount`</li>  <li>`$int minimumAmountCurrencyId`</li>  <li>`$bool isMinimumAmountTaxExcluded`</li>  <li>`$bool isMinimumAmountShippingExcluded`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CartRule\CommandHandler\AddCartRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CartRule\CommandHandler\AddCartRuleHandlerInterface`</li>  |
| **Return type** |  CartRuleId  |
#### DeleteCartRuleCommand {id="DeleteCartRuleCommand"}

`PrestaShop\PrestaShop\Core\Domain\CartRule\Command\DeleteCartRuleCommand`
_Deletes cart rule_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CartRule\CommandHandler\DeleteCartRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CartRule\CommandHandler\DeleteCartRuleHandlerInterface`</li>  |
| **Return type** |  void  |
#### BulkDeleteCartRuleCommand {id="BulkDeleteCartRuleCommand"}

`PrestaShop\PrestaShop\Core\Domain\CartRule\Command\BulkDeleteCartRuleCommand`
_Deletes cart rules in bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cartRuleIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CartRule\CommandHandler\BulkDeleteCartRuleHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CartRule\CommandHandler\BulkDeleteCartRuleHandlerInterface`</li>  |
| **Return type** |  void  |
#### ToggleCartRuleStatusCommand {id="ToggleCartRuleStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\CartRule\Command\ToggleCartRuleStatusCommand`
_Toggles cart rule status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartRuleId`</li>  <li>`$bool expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CartRule\CommandHandler\ToggleCartRuleStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CartRule\CommandHandler\ToggleCartRuleStatusHandlerInterface`</li>  |
| **Return type** |  void  |
#### BulkToggleCartRuleStatusCommand {id="BulkToggleCartRuleStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\CartRule\Command\BulkToggleCartRuleStatusCommand`
_Toggles cart rule status in bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array cartRuleIds`</li>  <li>`$bool expectedStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CartRule\CommandHandler\BulkToggleCartRuleStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CartRule\CommandHandler\BulkToggleCartRuleStatusHandlerInterface`</li>  |
| **Return type** |  void  |

### CartRule Queries

#### GetCartRuleForEditing {id="GetCartRuleForEditing"}

`PrestaShop\PrestaShop\Core\Domain\CartRule\Query\GetCartRuleForEditing`
_Gets cart rule for editing in Back Office_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartRuleId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CartRule\QueryHandler\GetCartRuleForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CartRule\QueryHandler\GetCartRuleForEditingHandlerInterface`</li>  |
| **Return type** |  EditableCartRule  |
#### SearchCartRules {id="SearchCartRules"}

`PrestaShop\PrestaShop\Core\Domain\CartRule\Query\SearchCartRules`
_Searches for cart rules_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string searchPhrase`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CartRule\QueryHandler\SearchCartRulesHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CartRule\QueryHandler\SearchCartRulesHandlerInterface`</li>  |
| **Return type** |  FoundCartRule[]  |
