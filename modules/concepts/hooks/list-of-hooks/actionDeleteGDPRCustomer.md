---
menuTitle: actionDeleteGDPRCustomer
Title: actionDeleteGDPRCustomer
hidden: true
hookTitle: 
files:
  - modules/psgdpr/psgdpr.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionDeleteGDPRCustomer

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [modules/psgdpr/psgdpr.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/psgdpr/psgdpr.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionDeleteGDPRCustomer', $customer, $module['id_module'])
```