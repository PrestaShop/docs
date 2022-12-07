---
menuTitle: actionCustomerAddGroups
Title: actionCustomerAddGroups
hidden: true
hookTitle: 
files:
  - classes/Customer.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionCustomerAddGroups

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php](classes/Customer.php)

## Hook call in codebase

```php
Hook::exec('actionCustomerAddGroups', ['id_customer' => $this->id, 'groups' => $groups])
```