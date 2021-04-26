---
title: SqlManagement domain
---

## SqlManagement domain

### SqlManagement Commands

#### SaveSqlRequestSettingsCommand {id="SaveSqlRequestSettingsCommand"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Command\SaveSqlRequestSettingsCommand`
_Class SaveSqlManagerSettingsCommand saves default file encoding settings for SqlRequest&#039;s query result export file._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$fileEncoding`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\SqlManagement\CommandHandler\SaveSqlRequestSettingsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\CommandHandler\SaveSqlRequestSettingsHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddSqlRequestCommand {id="AddSqlRequestCommand"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Command\AddSqlRequestCommand`
_This command creates new SqlRequest entity with provided data._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$name`</li>  <li>`$sql`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\CommandHandler\AddSqlRequestHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\CommandHandler\AddSqlRequestHandlerInterface`</li>  |
| **Return type** |  SqlRequestId  |
#### EditSqlRequestCommand {id="EditSqlRequestCommand"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Command\EditSqlRequestCommand`
_This command modifies an existing SqlRequest object, replacing its data by the provided one._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\SqlManagement\ValueObject\SqlRequestId sqlRequestId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\CommandHandler\EditSqlRequestHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\CommandHandler\EditSqlRequestHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteSqlRequestCommand {id="DeleteSqlRequestCommand"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Command\DeleteSqlRequestCommand`
_Class DeleteSqlRequestCommand command delete SqlRequest by given id._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$PrestaShop\PrestaShop\Core\Domain\SqlManagement\ValueObject\SqlRequestId sqlRequestId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\CommandHandler\DeleteSqlRequestHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\CommandHandler\DeleteSqlRequestHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteSqlRequestCommand {id="BulkDeleteSqlRequestCommand"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Command\BulkDeleteSqlRequestCommand`
_Class BulkDeleteSqlRequestCommand deletes provided SqlRequests._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array sqlRequestIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\CommandHandler\BulkDeleteSqlRequestHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\CommandHandler\BulkDeleteSqlRequestHandlerInterface`</li>  |
| **Return type** |  not defined  |

### SqlManagement Queries

#### GetSqlRequestSettings {id="GetSqlRequestSettings"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Query\GetSqlRequestSettings`
_Class GetSqlRequestSettingsQuery gets SqlRequest settings._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Core\Domain\SqlManagement\QueryHandler\GetSqlRequestSettingsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\QueryHandler\GetSqlRequestSettingsHandlerInterface`</li>  |
| **Return type** |  SqlRequestSettings  |
#### GetSqlRequestForEditing {id="GetSqlRequestForEditing"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Query\GetSqlRequestForEditing`
_Class GetSqlRequestForEditingQuery gets SqlRequest data that can be edited._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$requestSqlId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\QueryHandler\GetSqlRequestForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\QueryHandler\GetSqlRequestForEditingHandlerInterface`</li>  |
| **Return type** |  EditableSqlRequest  |
#### GetSqlRequestExecutionResult {id="GetSqlRequestExecutionResult"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Query\GetSqlRequestExecutionResult`
_Class GetSqlRequestExecutionResultQuery returns the result of executing an SqlRequest query._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$requestSqlId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\QueryHandler\GetSqlRequestExecutionResultHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\QueryHandler\GetSqlRequestExecutionResultHandlerInterface`</li>  |
| **Return type** |  SqlRequestExecutionResult  |
#### GetDatabaseTablesList {id="GetDatabaseTablesList"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Query\GetDatabaseTablesList`
_Class GetDatabaseTablesListQuery gets list of database tables._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\QueryHandler\GetDatabaseTablesListHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\QueryHandler\GetDatabaseTablesListHandlerInterface`</li>  |
| **Return type** |  DatabaseTablesList  |
#### GetDatabaseTableFieldsList {id="GetDatabaseTableFieldsList"}

`PrestaShop\PrestaShop\Core\Domain\SqlManagement\Query\GetDatabaseTableFieldsList`
_Class GetAttributesForDatabaseTableQuery gets list of attributes for given database table name._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$tableName`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\SqlManager\QueryHandler\GetDatabaseTableFieldsListHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\SqlManagement\QueryHandler\GetDatabaseTableFieldsListHandlerInterface`</li>  |
| **Return type** |  DatabaseTableFields  |
