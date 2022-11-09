---
menuTitle: displayAdminOrderSideBottom
Title: displayAdminOrderSideBottom
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminOrderSideBottom

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminOrderSideBottom', {'id_order': orderForViewing.id}) }}
```