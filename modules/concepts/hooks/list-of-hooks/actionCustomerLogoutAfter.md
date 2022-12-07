---
menuTitle: actionCustomerLogoutAfter
Title: actionCustomerLogoutAfter
hidden: true
hookTitle: After customer logout
files:
  - classes/Customer.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionCustomerLogoutAfter

## Information

{{% notice tip %}}
**After customer logout:** 

This hook allows you to execute code after customer logout
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php](classes/Customer.php)

## Hook call in codebase

```php
Hook::exec('actionCustomerLogoutAfter', ['customer' => $this])
```