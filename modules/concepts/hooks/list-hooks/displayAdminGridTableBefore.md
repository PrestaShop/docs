---
menuTitle: displayAdminGridTableBefore
title: displayAdminGridTableBefore
hidden: true
files:
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig
types:
  - backoffice
hookTypes:
  - twig
---

# Hook : displayAdminGridTableBefore

Located in :

  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig

## Parameters

```php
{{ renderhook('displayAdminGridTableBefore', {
    'grid': grid,
    'legacy_controller': app.request.attributes.get('_legacy_controller'),
    'controller': app.request.attributes.get('_controller')
  })
}}
```