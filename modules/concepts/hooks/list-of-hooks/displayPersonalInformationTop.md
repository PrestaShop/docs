---
menuTitle: displayPersonalInformationTop
Title: displayPersonalInformationTop
hidden: true
hookTitle: Content in the checkout funnel, on top of the personal information panel
files:
  - themes/classic/templates/checkout/_partials/steps/personal-information.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayPersonalInformationTop

## Information

{{% notice tip %}}
**Content in the checkout funnel, on top of the personal information panel:** 

Display actions or additional content in the personal details tab of the checkout funnel.
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/steps/personal-information.tpl](themes/classic/templates/checkout/_partials/steps/personal-information.tpl)

## Hook call in codebase

```php
{hook h='displayPersonalInformationTop' customer=$customer}
```