---
menuTitle: actionCustomerLogoutBefore
Title: actionCustomerLogoutBefore
hidden: true
hookTitle: Before customer logout
files:
  - classes/Customer.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionCustomerLogoutBefore

## Information

{{% notice tip %}}
**Before customer logout:** 

This hook allows you to execute code before customer logout
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php](classes/Customer.php)

## Hook call in codebase

```php
Hook::exec('actionCustomerLogoutBefore', ['customer' => $this])
```