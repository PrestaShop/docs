---
menuTitle: displayAdminOrderSide
Title: displayAdminOrderSide
hidden: true
hookTitle: Admin Order Side Column
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminOrderSide

## Informations

{{% notice tip %}}
**Admin Order Side Column:** 

This hook displays content in the order view page in the side column under the customer view
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminOrderSide', {'id_order': orderForViewing.id}) }}
```