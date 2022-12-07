---
menuTitle: displayCustomerAccountForm
Title: displayCustomerAccountForm
hidden: true
hookTitle: Customer account creation form
files:
  - classes/form/CustomerForm.php
locations:
  - frontoffice
type:
  - display
hookAliases:
 - createAccountForm
---

# Hook displayCustomerAccountForm

Aliases: 
 - createAccountForm



## Information

{{% notice tip %}}
**Customer account creation form:** 

This hook displays some information on the form to create a customer account
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerForm.php](classes/form/CustomerForm.php)

## Hook call in codebase

```php
Hook::exec('displayCustomerAccountForm')
```