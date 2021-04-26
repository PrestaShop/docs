---
title: Profile domain
---

## Profile domain

### Profile Commands

#### DeleteProfileCommand {id="DeleteProfileCommand"}

`PrestaShop\PrestaShop\Core\Domain\Profile\Command\DeleteProfileCommand`
_Class DeleteProfileCommand is a command to delete profile by given id._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$profileId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\CommandHandler\DeleteProfileHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Profile\CommandHandler\DeleteProfileHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### BulkDeleteProfileCommand {id="BulkDeleteProfileCommand"}

`PrestaShop\PrestaShop\Core\Domain\Profile\Command\BulkDeleteProfileCommand`
_Class BulkDeleteProfileCommand is a command to bulk delete profiles by given ids._

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array profileIds`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\CommandHandler\BulkDeleteProfileHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Profile\CommandHandler\BulkDeleteProfileHandlerInterface`</li>  |
| **Return type** |  not defined  |
#### AddProfileCommand {id="AddProfileCommand"}

`PrestaShop\PrestaShop\Core\Domain\Profile\Command\AddProfileCommand`
_Adds new profile_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$array localizedNames`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\CommandHandler\AddProfileHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Profile\CommandHandler\AddProfileHandlerInterface`</li>  |
| **Return type** |  ProfileId  |
#### EditProfileCommand {id="EditProfileCommand"}

`PrestaShop\PrestaShop\Core\Domain\Profile\Command\EditProfileCommand`
_Edits existing Profile_

| Command details            |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$profileId`</li>  <li>`$array localizedNames`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\CommandHandler\EditProfileHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Profile\CommandHandler\EditProfileHandlerInterface`</li>  |
| **Return type** |  not defined  |

### Profile Queries

#### GetProfileForEditing {id="GetProfileForEditing"}

`PrestaShop\PrestaShop\Core\Domain\Profile\Query\GetProfileForEditing`
_Get Profile data for editing_

| Query details              |    |
| -------------------------- | -- |
| **Constructor parameters** | <ul> <li>`$profileId`</li> </ul> |
| **Handler class**          | `PrestaShop\PrestaShop\Adapter\Profile\QueryHandler\GetProfileForEditingHandler`  <p> Implements: </p> <ul>  <li>`PrestaShop\PrestaShop\Core\Domain\Profile\QueryHandler\GetProfileForEditingHandlerInterface`</li>  |
| **Return type** |  mixed  |
