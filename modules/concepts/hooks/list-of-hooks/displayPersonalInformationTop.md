---
menuTitle: displayPersonalInformationTop
Title: displayPersonalInformationTop
hidden: true
hookTitle: 'Content in the checkout funnel, on top of the personal information panel'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/steps/personal-information.tpl'
        file: 'Classic Theme: templates/checkout/_partials/steps/personal-information.tpl'
locations:
    - 'front office'
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'Display actions or additional content in the personal details tab of the checkout funnel.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayPersonalInformationTop' customer=$customer}
```
