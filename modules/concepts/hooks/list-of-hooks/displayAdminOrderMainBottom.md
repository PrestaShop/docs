---
menuTitle: displayAdminOrderMainBottom
Title: displayAdminOrderMainBottom
hidden: true
hookTitle: Admin Order Main Column Bottom
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminOrderMainBottom

## Informations

{{% notice tip %}}
**Admin Order Main Column Bottom:** 

This hook displays content in the order view page at the bottom of the main column
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminOrderMainBottom', {'id_order': orderForViewing.id}) }}
```