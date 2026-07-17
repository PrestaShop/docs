---
Title: displayAdminDashboardToolbar
hidden: true
hookTitle: 'Symfony Dashboard - Toolbar'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Resources/views/Admin/Dashboard/index.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Dashboard/index.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: "Displays module content in the toolbar area of the migrated (Symfony) dashboard page. Modern counterpart of the legacy displayDashboardToolbarTopMenu hook."

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```twig
{{ renderhook('displayAdminDashboardToolbar') }}
```
