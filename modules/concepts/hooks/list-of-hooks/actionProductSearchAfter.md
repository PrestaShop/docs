---
menuTitle: actionProductSearchAfter
Title: actionProductSearchAfter
hidden: true
hookTitle: Event triggered after search product completed
files:
  - modules/blockwishlist/controllers/front/view.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductSearchAfter

## Informations

{{% notice tip %}}
**Event triggered after search product completed:** 

This hook is called after the product search. Parameters are already filter
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - modules/blockwishlist/controllers/front/view.php

## Hook call with parameters

```php
Hook::exec('actionProductSearchAfter', $searchVariables);
```