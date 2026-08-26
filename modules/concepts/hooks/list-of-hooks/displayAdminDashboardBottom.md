---
Title: displayAdminDashboardBottom
hidden: true
hookTitle: 'Symfony Dashboard - Bottom'
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
description: "Displays module content in a full-width area at the bottom of the migrated (Symfony) dashboard page."

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```twig
{{ renderhook('displayAdminDashboardBottom', {date_from: dateFrom, date_to: dateTo}) }}
```
