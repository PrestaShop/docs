---
menuTitle: actionAuthentication
Title: actionAuthentication
hidden: true
hookTitle: Successful customer authentication
files:
  - classes/form/CustomerLoginForm.php
locations:
  - front office
type: action
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
  - front office

Hook type: action

Located in: 
  - [classes/form/CustomerLoginForm.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerLoginForm.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAuthentication', ['customer' => $this->context->customer])
```