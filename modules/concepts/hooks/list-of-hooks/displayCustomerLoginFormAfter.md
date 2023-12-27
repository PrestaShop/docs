---
Title: displayCustomerLoginFormAfter
hidden: true
hookTitle: Display elements after login form
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/customer/authentication.tpl
      file: themes/classic/templates/customer/authentication.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/customer/authentication.tpl
      file: themes/hummingbird/templates/customer/authentication.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays new elements after the login form

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCustomerLoginFormAfter'}
```
