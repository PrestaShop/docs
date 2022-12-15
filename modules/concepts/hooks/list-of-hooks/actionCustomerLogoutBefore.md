---
menuTitle: actionCustomerLogoutBefore
Title: actionCustomerLogoutBefore
hidden: true
hookTitle: Before customer logout
files:
  - classes/Customer.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionCustomerLogoutBefore

## Information

{{% notice tip %}}
**Before customer logout:** 

This hook allows you to execute code before customer logout
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Customer.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerLogoutBefore', ['customer' => $this])
```