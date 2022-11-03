---
menuTitle: displayAdminThemesListAfter
title: displayAdminThemesListAfter
hidden: true
files:
  - src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig
types:
  - backoffice
hookTypes:
  - twig
---

# Hook : displayAdminThemesListAfter

Located in :

  - src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig

## Parameters

```php
{{ renderhook('displayAdminThemesListAfter', { 'current_theme_name': currentlyUsedTheme.get('name') }) }}
```