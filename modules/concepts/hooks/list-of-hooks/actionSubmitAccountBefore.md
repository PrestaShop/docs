---
menuTitle: actionSubmitAccountBefore
Title: actionSubmitAccountBefore
hidden: true
hookTitle: 
files:
  - controllers/front/RegistrationController.php
locations:
  - front office
type: action
hookAliases:
 - actionBeforeSubmitAccount
---

# Hook actionSubmitAccountBefore

Aliases: 
 - actionBeforeSubmitAccount



## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [controllers/front/RegistrationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/RegistrationController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionSubmitAccountBefore', [], null, true)
```