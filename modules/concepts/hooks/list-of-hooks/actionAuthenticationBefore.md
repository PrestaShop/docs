---
menuTitle: actionAuthenticationBefore
Title: actionAuthenticationBefore
hidden: true
hookTitle: 
files:
  - classes/form/CustomerLoginForm.php
locations:
  - front office
type: action
hookAliases:
 - actionBeforeAuthentication
---

# Hook actionAuthenticationBefore

Aliases: 
 - actionBeforeAuthentication



## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/form/CustomerLoginForm.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerLoginForm.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAuthenticationBefore')
```