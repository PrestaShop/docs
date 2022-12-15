---
menuTitle: displayCustomerAccountFormTop
Title: displayCustomerAccountFormTop
hidden: true
hookTitle: Block above the form for create an account
files:
  - controllers/front/RegistrationController.php
locations:
  - front office
type: display
hookAliases:
 - createAccountTop
---

# Hook displayCustomerAccountFormTop

Aliases: 
 - createAccountTop



## Information

{{% notice tip %}}
**Block above the form for create an account:** 

This hook is displayed above the customer's account creation form
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [controllers/front/RegistrationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/RegistrationController.php)

## Call of the Hook in the origin file

```php
Hook::exec('displayCustomerAccountFormTop')
```