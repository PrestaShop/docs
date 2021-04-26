---
title: SpecificPrice domain
---

## SpecificPrice domain

### SpecificPrice Commands

#### AddSpecificPriceCommand {id="AddSpecificPriceCommand"}

`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\Command\AddSpecificPriceCommand`
_Adds specific price_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$string reductionType`</li>  <li>`$float reductionValue`</li>  <li>`$bool includeTax`</li>  <li>`$float price`</li>  <li>`$int fromQuantity`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SpecificPrice\CommandHandler\AddSpecificPriceHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\CommandHandler\AddSpecificPriceHandlerInterface`</li>  |
| **Return type** |  SpecificPriceId  |
#### DeleteSpecificPriceByCartProductCommand {id="DeleteSpecificPriceByCartProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\Command\DeleteSpecificPriceByCartProductCommand`
_Deletes specific price by cart id_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$int productId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SpecificPrice\CommandHandler\DeleteSpecificPriceByCartProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\CommandHandler\DeleteSpecificPriceByCartProductHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetSpecificPricePriorityForProductCommand {id="SetSpecificPricePriorityForProductCommand"}

`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\Command\SetSpecificPricePriorityForProductCommand`
_Sets specific price priority for provided product_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int productId`</li>  <li>`$array priorities`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SpecificPrice\CommandHandler\SetSpecificPricePriorityForProductHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\CommandHandler\SetSpecificPricePriorityForProductHandlerInterface`</li>  |
| **Return type** |  void  |
#### SetGlobalSpecificPricePriorityCommand {id="SetGlobalSpecificPricePriorityCommand"}

`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\Command\SetGlobalSpecificPricePriorityCommand`
_Sets global priorities for specific price_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array priorityList`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SpecificPrice\CommandHandler\SetGlobalSpecificPricePriorityHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SpecificPrice\CommandHandler\SetGlobalSpecificPricePriorityHandlerInterface`</li>  |
| **Return type** |  void  |

### SpecificPrice Queries

