---
menuTitle: displayAdminGridTableAfter
Title: displayAdminGridTableAfter
hidden: true
hookTitle: Display after Grid table
files:
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminGridTableAfter

## Informations

{{% notice tip %}}
**Display after Grid table:** 

This hook adds new blocks after Grid component table
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminGridTableAfter', {
      'grid': grid,
      'legacy_controller': app.request.attributes.get('_legacy_controller'),
      'controller': app.request.attributes.get('_controller')
    })
}}
```