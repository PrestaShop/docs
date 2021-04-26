---
title: Notification domain
---

## Notification domain

### Notification Commands

#### UpdateEmployeeNotificationLastElementCommand {id="UpdateEmployeeNotificationLastElementCommand"}

`PrestaShop\PrestaShop\Core\Domain\Notification\Command\UpdateEmployeeNotificationLastElementCommand`
_Updates the last notification element from a given type seen by the employee_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string type`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Notification\CommandHandler\UpdateEmployeeNotificationLastElementHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Notification\CommandHandler\UpdateEmployeeNotificationLastElementCommandHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Notification Queries

#### GetNotificationLastElements {id="GetNotificationLastElements"}

`PrestaShop\PrestaShop\Core\Domain\Notification\Query\GetNotificationLastElements`
_This Query return the last Notifications elements_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int employeeId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Notification\QueryHandler\GetNotificationLastElementsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Notification\QueryHandler\GetNotificationLastElementsHandlerInterface`</li>  |
| **Return type** |  NotificationsResults  |
