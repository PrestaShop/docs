---
Title: displayAdminEndContent
hidden: true
hookTitle: 'Administration end of content'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/default/template/footer.tpl'
        file: admin-dev/themes/default/template/footer.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/new-theme/template/layout.tpl'
        file: admin-dev/themes/new-theme/template/layout.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/new-theme/template/light_display_layout.tpl'
        file: admin-dev/themes/new-theme/template/light_display_layout.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Layout/default_layout.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Layout/default_layout.html.twig
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Layout/light_layout.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Layout/light_layout.html.twig
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
