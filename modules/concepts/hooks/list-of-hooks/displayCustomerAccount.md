---
menuTitle: displayCustomerAccount
Title: displayCustomerAccount
hidden: true
hookTitle: 'Customer account displayed in Front Office'
files:
    -
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/customer/my-account.tpl'
        file: 'Classic Theme: templates/customer/my-account.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - customerAccount
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays new elements on the customer account page'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCustomerAccount'}
```
