---
menuTitle: actionPasswordRenew
Title: actionPasswordRenew
hidden: true
hookTitle: 
files:
  - controllers/front/PasswordController.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionPasswordRenew

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [controllers/front/PasswordController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/PasswordController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionPasswordRenew', ['customer' => $customer, 'password' => $password])
```