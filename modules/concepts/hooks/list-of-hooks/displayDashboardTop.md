---
menuTitle: displayDashboardTop
Title: displayDashboardTop
hidden: true
hookTitle: 'Dashboard Top'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/new-theme/template/page_header_toolbar.tpl'
        file: admin-dev/themes/new-theme/template/page_header_toolbar.tpl
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: "Displays the content in the dashboard's top area"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayDashboardTop'}
```
