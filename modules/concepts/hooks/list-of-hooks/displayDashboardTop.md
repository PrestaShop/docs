---
Title: displayDashboardTop
hidden: true
hookTitle: 'Dashboard Top'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/default/template/page_header_toolbar.tpl'
        file: admin-dev/themes/default/template/page_header_toolbar.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/new-theme/template/page_header_toolbar.tpl'
        file: admin-dev/themes/new-theme/template/page_header_toolbar.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminDashboardController.php'
        file: controllers/admin/AdminDashboardController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/Layout/toolbar.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/Layout/toolbar.html.twig
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/toolbar.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/toolbar.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Displays the content in the dashboard''s top area'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayDashboardTop'}
```
