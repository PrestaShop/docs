---
title: Employee domain
---

## Employee domain

### Employee Commands

#### ToggleEmployeeStatusCommand {id="ToggleEmployeeStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Command\ToggleEmployeeStatusCommand`
_Class ToggleEmployeeStatusCommand._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$employeeId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\CommandHandler\ToggleEmployeeStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\CommandHandler\ToggleEmployeeStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkUpdateEmployeeStatusCommand {id="BulkUpdateEmployeeStatusCommand"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Command\BulkUpdateEmployeeStatusCommand`
_Class UpdateEmployeesStatusCommand updates employees status._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array employeeIds`</li>  <li>`$status`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\CommandHandler\BulkUpdateEmployeeStatusHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\CommandHandler\BulkUpdateEmployeeStatusHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteEmployeeCommand {id="DeleteEmployeeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Command\DeleteEmployeeCommand`
_Class DeleteEmployeeCommand deletes given employee._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$employeeId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\CommandHandler\DeleteEmployeeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\CommandHandler\DeleteEmployeeHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteEmployeeCommand {id="BulkDeleteEmployeeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Command\BulkDeleteEmployeeCommand`
_Class BulkDeleteEmployeeCommand._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array employeeIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\CommandHandler\BulkDeleteEmployeeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\CommandHandler\BulkDeleteEmployeeHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddEmployeeCommand {id="AddEmployeeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Command\AddEmployeeCommand`
_Adds new employee with given data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$firstName`</li>  <li>`$lastName`</li>  <li>`$email`</li>  <li>`$plainPassword`</li>  <li>`$defaultPageId`</li>  <li>`$languageId`</li>  <li>`$active`</li>  <li>`$profileId`</li>  <li>`$array shopAssociation`</li>  <li>`$bool hasEnabledGravatar = false`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\CommandHandler\AddEmployeeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\CommandHandler\AddEmployeeHandlerInterface`</li>  |
| **Return type** |  EmployeeId Added employee&#039;s ID  |
#### EditEmployeeCommand {id="EditEmployeeCommand"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Command\EditEmployeeCommand`
_Edit employee with given data._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$employeeId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\CommandHandler\EditEmployeeHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\CommandHandler\EditEmployeeHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Employee Queries

#### GetEmployeeForEditing {id="GetEmployeeForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Query\GetEmployeeForEditing`
_Gets employee information for editing._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$employeeId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\QueryHandler\GetEmployeeForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\QueryHandler\GetEmployeeForEditingHandlerInterface`</li>  |
| **Return type** |  EditableEmployee  |
#### GetEmployeeEmailById {id="GetEmployeeEmailById"}

`PrestaShop\PrestaShop\Core\Domain\Employee\Query\GetEmployeeEmailById`
__

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int employeeId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\Employee\QueryHandler\GetEmployeeEmailByIdHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Employee\QueryHandler\GetEmployeeEmailByIdHandlerInterface`</li>  |
| **Return type** |  Email  |
