---
menuTitle: displayAdminGridTableAfter
title: displayAdminGridTableAfter
hidden: true
files:
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig
types:
  - backoffice
hookTypes:
  - twig
---

# Hook : displayAdminGridTableAfter

Located in :

  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig

## Parameters

```php
{{ renderhook('displayAdminGridTableAfter', {
      'grid': grid,
      'legacy_controller': app.request.attributes.get('_legacy_controller'),
      'controller': app.request.attributes.get('_controller')
    })
}}
```