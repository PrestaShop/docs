---
menuTitle: actionProductSearchAfter
Title: actionProductSearchAfter
hidden: true
hookTitle: Event triggered after search product completed
files:
  - modules/blockwishlist/controllers/front/view.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionProductSearchAfter

## Information

{{% notice tip %}}
**Event triggered after search product completed:** 

This hook is called after the product search. Parameters are already filter
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/blockwishlist/controllers/front/view.php](modules/blockwishlist/controllers/front/view.php)

## Hook call in codebase

```php
Hook::exec('actionProductSearchAfter', $searchVariables)
```