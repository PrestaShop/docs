---
menuTitle: displayAdminOrderMain
Title: displayAdminOrderMain
hidden: true
hookTitle: Admin Order Main Column
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminOrderMain

## Informations

{{% notice tip %}}
**Admin Order Main Column:** 

This hook displays content in the order view page in the main column under the details view
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminOrderMain', {'id_order': orderForViewing.id}) }}
```