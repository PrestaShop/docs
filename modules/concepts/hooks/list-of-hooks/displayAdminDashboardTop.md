---
Title: displayAdminDashboardTop
hidden: true
hookTitle: 'Symfony Dashboard - Top'
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
description: "Displays module content in the top area of the migrated (Symfony) dashboard page. Modern counterpart of the legacy displayDashboardTop hook."

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```twig
{{ renderhook('displayAdminDashboardTop', {date_from: dateFrom, date_to: dateTo}) }}
```
