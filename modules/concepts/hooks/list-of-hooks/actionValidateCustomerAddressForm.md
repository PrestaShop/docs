---
menuTitle: actionValidateCustomerAddressForm
Title: actionValidateCustomerAddressForm
hidden: true
hookTitle: Customer address form validation
files:
  - classes/form/CustomerAddressForm.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionValidateCustomerAddressForm

## Information

{{% notice tip %}}
**Customer address form validation:** 

This hook is called when a customer submit its address form
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/form/CustomerAddressForm.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerAddressForm.php)

## Parameters details

```php
    <?php
    array(
      'form' => (object) CustomerAddressForm
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionValidateCustomerAddressForm', ['form' => $this])
```