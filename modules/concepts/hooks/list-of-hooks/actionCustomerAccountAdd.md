---
menuTitle: actionCustomerAccountAdd
Title: actionCustomerAccountAdd
hidden: true
hookTitle: 'Successful customer account creation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerPersister.php'
        file: classes/form/CustomerPersister.php
locations:
    - 'front office'
type: action
hookAliases:
    - createAccount
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when a new customer creates an account successfully'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'newCustomer' => (object) Customer object
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionCustomerAccountAdd', [
                'newCustomer' => $customer,
            ])
```
