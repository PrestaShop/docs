---
Title: displayAdminEndContent
hidden: true
hookTitle: 'Administration end of content'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/new-theme/template/light_display_layout.tpl'
        file: admin-dev/themes/new-theme/template/light_display_layout.tpl
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed at the end of the main content, before the footer'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAdminEndContent'}
```
