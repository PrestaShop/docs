---
menuTitle: actionProductSearchAfter
Title: actionProductSearchAfter
hidden: true
hookTitle: Event triggered after search product completed
files:
  - modules/blockwishlist/controllers/front/view.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionProductSearchAfter

## Information

{{% notice tip %}}
**Event triggered after search product completed:** 

This hook is called after the product search. Parameters are already filter
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [modules/blockwishlist/controllers/front/view.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/blockwishlist/controllers/front/view.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSearchAfter', $searchVariables)
```