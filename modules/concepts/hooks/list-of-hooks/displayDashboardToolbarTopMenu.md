---
menuTitle: displayDashboardToolbarTopMenu
Title: displayDashboardToolbarTopMenu
hidden: true
hookTitle: Display new elements in back office page with a dashboard, on top Menu
files:
  - admin-dev/themes/new-theme/template/page_header_toolbar.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayDashboardToolbarTopMenu

## Information

{{% notice tip %}}
**Display new elements in back office page with a dashboard, on top Menu:** 

This hook launches modules when a page with a dashboard is displayed
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [admin-dev/themes/new-theme/template/page_header_toolbar.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/new-theme/template/page_header_toolbar.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayDashboardToolbarTopMenu'}
```