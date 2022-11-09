---
menuTitle: displayAdminOrder
Title: displayAdminOrder
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminOrder
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminOrder

## Informations

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminOrder:** 

This hook launches modules when the AdminOrder tab is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminOrder', {'id_order': orderForViewing.id}) }}
```