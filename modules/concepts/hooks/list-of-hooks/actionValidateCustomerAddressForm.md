---
Title: actionValidateCustomerAddressForm
hidden: true
hookTitle: 'Customer address form validation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerAddressForm.php'
        file: classes/form/CustomerAddressForm.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when a customer submit its address form'

---

{{% hookDescriptor %}}

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
