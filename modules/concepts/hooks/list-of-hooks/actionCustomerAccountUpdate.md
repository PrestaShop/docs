---
menuTitle: actionCustomerAccountUpdate
Title: actionCustomerAccountUpdate
hidden: true
hookTitle: Successful customer account update
files:
  - classes/form/CustomerPersister.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionCustomerAccountUpdate

## Information

{{% notice tip %}}
**Successful customer account update:** 

This hook is called when a customer updates its account successfully
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerPersister.php](classes/form/CustomerPersister.php)

## Hook call in codebase

```php
Hook::exec('actionCustomerAccountUpdate', [
                'customer' => $customer,
            ])
```