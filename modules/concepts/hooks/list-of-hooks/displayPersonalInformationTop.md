---
menuTitle: displayPersonalInformationTop
Title: displayPersonalInformationTop
hidden: true
hookTitle: Content in the checkout funnel, on top of the personal information panel
files:
  - Classic Theme: templates/checkout/_partials/steps/personal-information.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayPersonalInformationTop

## Information

{{% notice tip %}}
**Content in the checkout funnel, on top of the personal information panel:** 

Display actions or additional content in the personal details tab of the checkout funnel.
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [Classic Theme: templates/checkout/_partials/steps/personal-information.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/steps/personal-information.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayPersonalInformationTop' customer=$customer}
```