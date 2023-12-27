---
Title: displayOrderConfirmation2
hidden: true
hookTitle: displayOrderConfirmation2
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/order-confirmation.tpl
      file: themes/classic/templates/checkout/order-confirmation.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/order-confirmation.tpl
      file: themes/hummingbird/templates/checkout/order-confirmation.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayOrderConfirmation2'}
```
