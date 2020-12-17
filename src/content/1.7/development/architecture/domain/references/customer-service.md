---
title: CustomerService domain
---

## CustomerService domain

### CustomerService Commands

#### UpdateCustomerThreadStatusCommand {id="UpdateCustomerThreadStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\CustomerService\Command\UpdateCustomerThreadStatusCommand`
_Updates customer thread with given status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerThreadId`</li>  <li>`$newCustomerThreadStatus`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\CustomerService\CommandHandler\UpdateCustomerThreadStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CustomerService\CommandHandler\UpdateCustomerThreadStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ForwardCustomerThreadCommand {id="ForwardCustomerThreadCommand"}

`PrestaShop\PrestaShop\Core\Domain\CustomerService\Command\ForwardCustomerThreadCommand`
_Forwards customer thread_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CustomerService\CommandHandler\ForwardCustomerThreadHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CustomerService\CommandHandler\ForwardCustomerThreadHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### ReplyToCustomerThreadCommand {id="ReplyToCustomerThreadCommand"}

`PrestaShop\PrestaShop\Core\Domain\CustomerService\Command\ReplyToCustomerThreadCommand`
_Reply to given customer thread_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerThreadId`</li>  <li>`$replyMessage`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CustomerService\CommandHandler\ReplyToCustomerThreadHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CustomerService\CommandHandler\ReplyToCustomerThreadHandlerInterface`</li>  |
| **Return type** |  not defined  |

### CustomerService Queries

#### GetCustomerThreadForViewing {id="GetCustomerThreadForViewing"}

`PrestaShop\PrestaShop\Core\Domain\CustomerService\Query\GetCustomerThreadForViewing`
_Gets customer thread for viewing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerThreadId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\CustomerService\QueryHandler\GetCustomerThreadForViewingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CustomerService\QueryHandler\GetCustomerThreadForViewingHandlerInterface`</li>  |
| **Return type** |  CustomerThreadView  |
#### GetCustomerServiceSignature {id="GetCustomerServiceSignature"}

`PrestaShop\PrestaShop\Core\Domain\CustomerService\Query\GetCustomerServiceSignature`
_Gets signature for replying in customer thread_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$languageId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\CustomerService\QueryHandler\GetCustomerServiceSignatureHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\CustomerService\QueryHandler\GetCustomerServiceSignatureHandlerInterface`</li>  |
| **Return type** |  string  |
