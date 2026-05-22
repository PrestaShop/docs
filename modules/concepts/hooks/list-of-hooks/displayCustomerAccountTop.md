---
Title: displayCustomerAccountTop
hidden: true
hookTitle: 'Customer account displayed in Front Office (Top part)'
files:
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/customer/my-account.tpl
      file: themes/hummingbird/templates/customer/my-account.tpl
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: theme
description: 'This hook displays new elements on the customer account page on Top'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCustomerAccountTop'}
```
