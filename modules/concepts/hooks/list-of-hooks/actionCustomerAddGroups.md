---
menuTitle: actionCustomerAddGroups
Title: actionCustomerAddGroups
hidden: true
hookTitle: 
files:
  - classes/Customer.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionCustomerAddGroups

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Customer.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerAddGroups', ['id_customer' => $this->id, 'groups' => $groups])
```