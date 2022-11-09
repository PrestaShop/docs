---
menuTitle: displayPersonalInformationTop
Title: displayPersonalInformationTop
hidden: true
hookTitle: Content in the checkout funnel, on top of the personal information panel
files:
  - themes/classic/templates/checkout/_partials/steps/personal-information.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayPersonalInformationTop

## Informations

{{% notice tip %}}
**Content in the checkout funnel, on top of the personal information panel:** 

Display actions or additional content in the personal details tab of the checkout funnel.
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/checkout/_partials/steps/personal-information.tpl

## Hook call with parameters

```php
{hook h='displayPersonalInformationTop' customer=$customer}
```