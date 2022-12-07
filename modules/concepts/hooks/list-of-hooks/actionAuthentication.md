---
menuTitle: actionAuthentication
Title: actionAuthentication
hidden: true
hookTitle: Successful customer authentication
files:
  - classes/form/CustomerLoginForm.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - authentication
---

# Hook actionAuthentication

Aliases: 
 - authentication



## Information

{{% notice tip %}}
**Successful customer authentication:** 

This hook is displayed after a customer successfully signs in
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerLoginForm.php](classes/form/CustomerLoginForm.php)

## Hook call in codebase

```php
Hook::exec('actionAuthentication', ['customer' => $this->context->customer])
```