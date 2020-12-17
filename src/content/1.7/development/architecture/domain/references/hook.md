---
title: Hook domain
---

## Hook domain

### Hook Commands

#### UpdateHookStatusCommand {id="UpdateHookStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Hook\Command\UpdateHookStatusCommand`
_Class UpdateHookStatusCommand update a given hook status_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int hookId`</li>  <li>`$bool status`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Hook\CommandHandler\UpdateHookStatusCommandHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Hook\CommandHandler\UpdateHookStatusCommandHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Hook Queries

#### GetHookStatus {id="GetHookStatus"}

`PrestaShop\PrestaShop\Core\Domain\Hook\Query\GetHookStatus`
_Get current status (enabled/disabled) for a given hook_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int hookId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Hook\QueryHandler\GetHookStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Hook\QueryHandler\GetHookStatusHandlerInterface`</li>  |
| **Return type** |  bool  |
