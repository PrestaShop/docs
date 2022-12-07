---
menuTitle: actionCustomerAccountAdd
Title: actionCustomerAccountAdd
hidden: true
hookTitle: Successful customer account creation
files:
  - classes/form/CustomerPersister.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - createAccount
---

# Hook actionCustomerAccountAdd

Aliases: 
 - createAccount



## Information

{{% notice tip %}}
**Successful customer account creation:** 

This hook is called when a new customer creates an account successfully
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerPersister.php](classes/form/CustomerPersister.php)

## Parameters details

```php
    <?php
    array(
      'newCustomer' => (object) Customer object
    );
```

## Hook call in codebase

```php
Hook::exec('actionCustomerAccountAdd', [
                'newCustomer' => $customer,
            ])
```