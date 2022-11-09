---
menuTitle: displayAdminOrderCreateExtraButtons
Title: displayAdminOrderCreateExtraButtons
hidden: true
hookTitle: Add buttons on the create order page dropdown
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/Create/summary.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminOrderCreateExtraButtons

## Informations

{{% notice tip %}}
**Add buttons on the create order page dropdown:** 

Add buttons on the create order page dropdown
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/Create/summary.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminOrderCreateExtraButtons') }}
```