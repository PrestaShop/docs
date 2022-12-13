---
menuTitle: actionCustomerBeforeUpdateGroup
Title: actionCustomerBeforeUpdateGroup
hidden: true
hookTitle: 
files:
  - classes/Customer.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionCustomerBeforeUpdateGroup

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Customer.php](classes/Customer.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerBeforeUpdateGroup', ['id_customer' => $this->id, 'groups' => $list])
```