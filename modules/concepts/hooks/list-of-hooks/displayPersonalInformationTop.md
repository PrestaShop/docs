---
Title: displayPersonalInformationTop
hidden: true
hookTitle: Content in the checkout funnel, on top of the personal information panel
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/steps/personal-information.tpl
      file: themes/classic/templates/checkout/_partials/steps/personal-information.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/checkout/_partials/steps/personal-information.tpl
      file: themes/hummingbird/templates/checkout/_partials/steps/personal-information.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: Display actions or additional content in the personal details tab of the checkout funnel.

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayPersonalInformationTop' customer=$customer}
```
