---
menuTitle: displayAddressSelectorBottom
Title: displayAddressSelectorBottom
hidden: true
hookTitle: 
files:
  - Classic Theme: templates/checkout/_partials/steps/addresses.tpl
locations:
  - front office
type: display
hookAliases:
since: 8.1.0
---

# Hook displayAddressSelectorBottom

## Information

{{% notice tip %}}
**Add a message (or other content) on address step of checkout**
{{% /notice %}}

Available since : {{< minver v="8.1.0" >}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [Classic Theme: templates/checkout/_partials/steps/addresses.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/steps/addresses.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayAddressSelectorBottom'}
```