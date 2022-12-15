---
menuTitle: actionCustomerLogoutAfter
Title: actionCustomerLogoutAfter
hidden: true
hookTitle: After customer logout
files:
  - classes/Customer.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionCustomerLogoutAfter

## Information

{{% notice tip %}}
**After customer logout:** 

This hook allows you to execute code after customer logout
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Customer.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerLogoutAfter', ['customer' => $this])
```