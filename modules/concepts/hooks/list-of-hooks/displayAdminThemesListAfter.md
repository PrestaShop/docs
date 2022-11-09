---
menuTitle: displayAdminThemesListAfter
Title: displayAdminThemesListAfter
hidden: true
hookTitle: BO themes list extra content
files:
  - src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminThemesListAfter

## Informations

{{% notice tip %}}
**BO themes list extra content:** 

This hook displays content after the themes list in the back office
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminThemesListAfter', { 'current_theme_name': currentlyUsedTheme.get('name') }) }}
```