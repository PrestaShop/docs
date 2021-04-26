---
title: Customer domain
---

## Customer domain

### Customer Commands

#### SetPrivateNoteAboutCustomerCommand {id="SetPrivateNoteAboutCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\SetPrivateNoteAboutCustomerCommand`
_Sets private note about customer that can only be seen in Back Office_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerId`</li>  <li>`$privateNote`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\SetPrivateNoteAboutCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\SetPrivateNoteAboutCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### TransformGuestToCustomerCommand {id="TransformGuestToCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\TransformGuestToCustomerCommand`
_Transforms guest (customer without password) into registered customer account_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\TransformGuestToCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\TransformGuestToCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### SetRequiredFieldsForCustomerCommand {id="SetRequiredFieldsForCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\SetRequiredFieldsForCustomerCommand`
_Sets required fields for new customer when signing up in Front Office_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array requiredFields`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\SetRequiredFieldsForCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\SetRequiredFieldsForCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCustomerCommand {id="AddCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\AddCustomerCommand`
_Adds new customer with provided data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$firstName`</li>  <li>`$lastName`</li>  <li>`$email`</li>  <li>`$password`</li>  <li>`$defaultGroupId`</li>  <li>`$array groupIds`</li>  <li>`$shopId`</li>  <li>`$?genderId = NULL`</li>  <li>`$?isEnabled = true`</li>  <li>`$?isPartnerOffersSubscribed = false`</li>  <li>`$?birthday = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\AddCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\AddCustomerHandlerInterface`</li>  |
| **Return type** |  CustomerId  |
#### EditCustomerCommand {id="EditCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\EditCustomerCommand`
_Edits provided customer. It can edit either all or partial data. Only not-null values are considered when editing customer. For example, if the email is null, then the original value is not modified, however, if email is set, then the original value will be overwritten._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\EditCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\EditCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkEnableCustomerCommand {id="BulkEnableCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\BulkEnableCustomerCommand`
_Enables customers in bulk action._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array customerIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\BulkEnableCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\BulkEnableCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDisableCustomerCommand {id="BulkDisableCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\BulkDisableCustomerCommand`
_Disables customers in bulk action._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array customerIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\BulkDisableCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\BulkDisableCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### DeleteCustomerCommand {id="DeleteCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\DeleteCustomerCommand`
_Deletes given customer._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerId`</li>  <li>`$deleteMethod`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\DeleteCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\DeleteCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteCustomerCommand {id="BulkDeleteCustomerCommand"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Command\BulkDeleteCustomerCommand`
_Deletes given customers._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array customerIds`</li>  <li>`$deleteMethod`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\CommandHandler\BulkDeleteCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\CommandHandler\BulkDeleteCustomerHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Customer Queries

#### GetCustomerForViewing {id="GetCustomerForViewing"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Query\GetCustomerForViewing`
_Gets detailed customer information for viewing in Back Office._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\QueryHandler\GetCustomerForViewingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler\GetCustomerForViewingHandlerInterface`</li>  |
| **Return type** |  ViewableCustomer  |
#### GetRequiredFieldsForCustomer {id="GetRequiredFieldsForCustomer"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Query\GetRequiredFieldsForCustomer`
_Gets fields that are required for customer sign up_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\QueryHandler\GetRequiredFieldsForCustomerHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler\GetRequiredFieldsForCustomerHandlerInterface`</li>  |
| **Return type** |  string[]  |
#### GetCustomerForEditing {id="GetCustomerForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Query\GetCustomerForEditing`
_Gets customer information for editing._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\QueryHandler\GetCustomerForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler\GetCustomerForEditingHandlerInterface`</li>  |
| **Return type** |  EditableCustomer  |
#### SearchCustomers {id="SearchCustomers"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Query\SearchCustomers`
_Searchers for customers by phrases matching customer&#039;s first name, last name, email and id_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array phrases`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\QueryHandler\SearchCustomersHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler\SearchCustomersHandlerInterface`</li>  |
| **Return type** |  array  |
#### GetCustomerCarts {id="GetCustomerCarts"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Query\GetCustomerCarts`
_Query for getting summarized customer carts_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\QueryHandler\GetCustomerCartsHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler\GetCustomerCartsHandlerInterface`</li>  |
| **Return type** |  CartSummary[]  |
#### GetCustomerOrders {id="GetCustomerOrders"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Query\GetCustomerOrders`
_Query for getting summarized customer orders_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int customerId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\QueryHandler\GetCustomerOrdersHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler\GetCustomerOrdersHandlerInterface`</li>  |
| **Return type** |  OrderSummary[]  |
#### GetCustomerForAddressCreation {id="GetCustomerForAddressCreation"}

`PrestaShop\PrestaShop\Core\Domain\Customer\Query\GetCustomerForAddressCreation`
_Gets customer information for address creation._

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$string customerEmail`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Customer\QueryHandler\GetCustomerForAddressCreationHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Customer\QueryHandler\GetCustomerForAddressCreationHandlerInterface`</li>  |
| **Return type** |  AddressCreationCustomerInformation  |
