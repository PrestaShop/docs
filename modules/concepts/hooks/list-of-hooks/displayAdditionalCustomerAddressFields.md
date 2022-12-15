---
menuTitle: displayAdditionalCustomerAddressFields
Title: displayAdditionalCustomerAddressFields
hidden: true
hookTitle: Display additional customer address fields
files:
  - themes/classic/templates/customer/_partials/block-address.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayAdditionalCustomerAddressFields

## Information

{{% notice tip %}}
**Display additional customer address fields:** 

This hook allows to display extra field values added in an address form using hook 'additionalCustomerAddressFields'
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/customer/_partials/block-address.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/customer/_partials/block-address.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayAdditionalCustomerAddressFields' address=$address}
```