---
menuTitle: displayAdminEndContent
Title: displayAdminEndContent
hidden: true
hookTitle: Administration end of content
files:
  - admin-dev/themes/new-theme/template/light_display_layout.tpl
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminEndContent

## Information

{{% notice tip %}}
**Administration end of content:** 

This hook is displayed at the end of the main content, before the footer
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [admin-dev/themes/new-theme/template/light_display_layout.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/new-theme/template/light_display_layout.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayAdminEndContent'}
```