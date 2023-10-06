---
menuTitle: displayAdditionalCustomerAddressFields
Title: displayAdditionalCustomerAddressFields
hidden: true
hookTitle: 'Display additional customer address fields'
files:
    -
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/customer/_partials/block-address.tpl'
        file: 'Classic Theme: templates/customer/_partials/block-address.tpl'
locations:
    - 'front office'
type: display
hookAliases: null
origin: theme
array_return: false
check_exceptions: false
chain: false
description: "This hook allows to display extra field values added in an address form using hook 'additionalCustomerAddressFields'"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAdditionalCustomerAddressFields' address=$address}
```
