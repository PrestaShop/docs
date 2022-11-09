---
menuTitle: displayAdminGridTableBefore
Title: displayAdminGridTableBefore
hidden: true
hookTitle: Display before Grid table
files:
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminGridTableBefore

## Informations

{{% notice tip %}}
**Display before Grid table:** 

This hook adds new blocks before Grid component table
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminGridTableBefore', {
    'grid': grid,
    'legacy_controller': app.request.attributes.get('_legacy_controller'),
    'controller': app.request.attributes.get('_controller')
  })
}}
```