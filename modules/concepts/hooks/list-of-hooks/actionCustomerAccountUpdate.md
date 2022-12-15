---
menuTitle: actionCustomerAccountUpdate
Title: actionCustomerAccountUpdate
hidden: true
hookTitle: Successful customer account update
files:
  - classes/form/CustomerPersister.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionCustomerAccountUpdate

## Information

{{% notice tip %}}
**Successful customer account update:** 

This hook is called when a customer updates its account successfully
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/form/CustomerPersister.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerPersister.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerAccountUpdate', [
                'customer' => $customer,
            ])
```