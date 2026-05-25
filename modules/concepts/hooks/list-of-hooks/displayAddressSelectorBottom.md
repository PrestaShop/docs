---
Title: displayAddressSelectorBottom
hidden: true
hookTitle: 'After address selection on checkout page'
files:
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/steps/addresses.tpl
      file: themes/hummingbird/templates/checkout/_partials/steps/addresses.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/steps/addresses.tpl
      file: themes/classic/templates/checkout/_partials/steps/addresses.tpl
locations:
    - 'front office'
type: display
hookAliases: 
since: 8.1.0
origin: theme
array_return: false
check_exceptions: false
chain: false
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{capture name="address_selector_bottom"}{hook h='displayAddressSelectorBottom'}{/capture}
```
