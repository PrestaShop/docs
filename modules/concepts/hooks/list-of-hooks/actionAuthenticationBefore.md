---
menuTitle: actionAuthenticationBefore
Title: actionAuthenticationBefore
hidden: true
hookTitle: 
files:
  - classes/form/CustomerLoginForm.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - actionBeforeAuthentication
---

# Hook actionAuthenticationBefore

Aliases: 
 - actionBeforeAuthentication



## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerLoginForm.php](classes/form/CustomerLoginForm.php)

## Hook call in codebase

```php
Hook::exec('actionAuthenticationBefore')
```