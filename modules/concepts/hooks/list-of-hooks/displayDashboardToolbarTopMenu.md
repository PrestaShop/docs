---
menuTitle: displayDashboardToolbarTopMenu
Title: displayDashboardToolbarTopMenu
hidden: true
hookTitle: 'Display new elements in back office page with a dashboard, on top Menu'
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
description: 'This hook launches modules when a page with a dashboard is displayed'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayDashboardToolbarTopMenu'}
```
