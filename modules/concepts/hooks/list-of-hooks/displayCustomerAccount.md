---
Title: displayCustomerAccount
hidden: true
hookTitle: Customer account displayed in Front Office
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/customer/my-account.tpl
      file: themes/classic/templates/customer/my-account.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/components/account-menu.tpl
      file: themes/hummingbird/templates/components/account-menu.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/customer/my-account.tpl
      file: themes/hummingbird/templates/customer/my-account.tpl

locations:
    - front office
type: display
hookAliases:
    - customerAccount 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays new elements on the customer account page

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCustomerAccount'}
```
