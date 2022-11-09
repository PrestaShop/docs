---
menuTitle: displayDashboardToolbarIcons
Title: displayDashboardToolbarIcons
hidden: true
hookTitle: Display new elements in back office page with dashboard, on icons list
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/Blocks/tools.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayDashboardToolbarIcons

## Informations

{{% notice tip %}}
**Display new elements in back office page with dashboard, on icons list:** 

This hook launches modules when the back office with dashboard is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/Blocks/tools.html.twig

## Hook call with parameters

```php
{{ renderhook('displayDashboardToolbarIcons', {}) }}
```