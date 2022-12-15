---
menuTitle: actionSubmitCustomerAddressForm
Title: actionSubmitCustomerAddressForm
hidden: true
hookTitle: 
files:
  - classes/form/CustomerAddressForm.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionSubmitCustomerAddressForm

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/form/CustomerAddressForm.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerAddressForm.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionSubmitCustomerAddressForm', ['address' => &$address])
```