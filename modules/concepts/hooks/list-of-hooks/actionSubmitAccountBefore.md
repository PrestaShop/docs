---
menuTitle: actionSubmitAccountBefore
Title: actionSubmitAccountBefore
hidden: true
hookTitle: 
files:
  - controllers/front/RegistrationController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - actionBeforeSubmitAccount
---

# Hook actionSubmitAccountBefore

Aliases: 
 - actionBeforeSubmitAccount



## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/RegistrationController.php](controllers/front/RegistrationController.php)

## Hook call in codebase

```php
Hook::exec('actionSubmitAccountBefore', [], null, true)
```