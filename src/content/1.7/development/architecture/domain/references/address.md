---
title: Address domain
---

## Address domain

### Address Commands

#### DeleteAddressCommand {id="DeleteAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\DeleteAddressCommand`
_Deletes Address_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$addressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\DeleteAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\DeleteAddressHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteAddressCommand {id="BulkDeleteAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\BulkDeleteAddressCommand`
_Deletes addresses in bulk action_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$addressIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\BulkDeleteAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\BulkDeleteAddressHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddManufacturerAddressCommand {id="AddManufacturerAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\AddManufacturerAddressCommand`
_Adds new address_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$lastName`</li>  <li>`$firstName`</li>  <li>`$address`</li>  <li>`$countryId`</li>  <li>`$city`</li>  <li>`$?manufacturerId = NULL`</li>  <li>`$?address2 = NULL`</li>  <li>`$?postCode = NULL`</li>  <li>`$?stateId = NULL`</li>  <li>`$?homePhone = NULL`</li>  <li>`$?mobilePhone = NULL`</li>  <li>`$?other = NULL`</li>  <li>`$?dni = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\AddManufacturerAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\AddManufacturerAddressHandlerInterface`</li>  |
| **Return type** |  AddressId  |
#### EditManufacturerAddressCommand {id="EditManufacturerAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\EditManufacturerAddressCommand`
_Edits manufacturer address_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$addressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\EditManufacturerAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\EditManufacturerAddressHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### SetRequiredFieldsForAddressCommand {id="SetRequiredFieldsForAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\SetRequiredFieldsForAddressCommand`
_Sets required fields for new address when adding_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array requiredFields`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\SetRequiredFieldsForAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\SetRequiredFieldsForAddressHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddCustomerAddressCommand {id="AddCustomerAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\AddCustomerAddressCommand`
_Adds new customer address_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int customerId`</li>  <li>`$string addressAlias`</li>  <li>`$string firstName`</li>  <li>`$string lastName`</li>  <li>`$string address`</li>  <li>`$string city`</li>  <li>`$int countryId`</li>  <li>`$string postcode`</li>  <li>`$?string dni = NULL`</li>  <li>`$?string company = NULL`</li>  <li>`$?string vat_number = NULL`</li>  <li>`$?string address2 = NULL`</li>  <li>`$int id_state = 0`</li>  <li>`$?string phone = NULL`</li>  <li>`$?string phone_mobile = NULL`</li>  <li>`$?string other = NULL`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\AddCustomerAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\AddCustomerAddressHandlerInterface`</li>  |
| **Return type** |  AddressId  |
#### EditCustomerAddressCommand {id="EditCustomerAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\EditCustomerAddressCommand`
_Command responsible for holding edits customer address data_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int addressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\EditCustomerAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\EditCustomerAddressHandlerInterface`</li>  |
| **Return type** |  AddressId The (potentially) newly created address id  |
#### EditOrderAddressCommand {id="EditOrderAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\EditOrderAddressCommand`
_Class EditOrderAddressCommand used to edit an order address and then update the related field so that it uses the new duplicated address._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int orderId`</li>  <li>`$string addressType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\EditOrderAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\EditOrderAddressHandlerInterface`</li>  |
| **Return type** |  AddressId The newly created address id  |
#### EditCartAddressCommand {id="EditCartAddressCommand"}

`PrestaShop\PrestaShop\Core\Domain\Address\Command\EditCartAddressCommand`
_Class EditCartAddressCommand used to edit a cart address and then update the related field so that it uses the new duplicated address._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$int cartId`</li>  <li>`$string addressType`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\CommandHandler\EditCartAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\CommandHandler\EditCartAddressHandlerInterface`</li>  |
| **Return type** |  AddressId The newly created address id  |

### Address Queries

#### GetManufacturerAddressForEditing {id="GetManufacturerAddressForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Address\Query\GetManufacturerAddressForEditing`
_Gets manufacturer address for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$addressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\QueryHandler\GetManufacturerAddressForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\QueryHandler\GetManufacturerAddressForEditingHandlerInterface`</li>  |
| **Return type** |  EditableManufacturerAddress  |
#### GetRequiredFieldsForAddress {id="GetRequiredFieldsForAddress"}

`PrestaShop\PrestaShop\Core\Domain\Address\Query\GetRequiredFieldsForAddress`
_Gets fields that are required for address_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul></ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\QueryHandler\GetRequiredFieldsForAddressHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\QueryHandler\GetRequiredFieldsForAddressHandlerInterface`</li>  |
| **Return type** |  string[]  |
#### GetCustomerAddressForEditing {id="GetCustomerAddressForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Address\Query\GetCustomerAddressForEditing`
_Gets customer address for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$addressId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Address\QueryHandler\GetCustomerAddressForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Address\QueryHandler\GetCustomerAddressForEditingHandlerInterface`</li>  |
| **Return type** |  EditableCustomerAddress  |
