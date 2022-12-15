---
menuTitle: displayCustomerAccountForm
Title: displayCustomerAccountForm
hidden: true
hookTitle: Customer account creation form
files:
  - classes/form/CustomerForm.php
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [classes/form/CustomerForm.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerForm.php)

## Call of the Hook in the origin file

```php
Hook::exec('displayCustomerAccountForm')
```