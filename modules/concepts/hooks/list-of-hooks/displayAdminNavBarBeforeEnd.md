---
Title: displayAdminNavBarBeforeEnd
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/default/template/nav.tpl'
        file: admin-dev/themes/default/template/nav.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/new-theme/template/components/layout/nav_bar.tpl'
        file: admin-dev/themes/new-theme/template/components/layout/nav_bar.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/Layout/nav_bar.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/Layout/nav_bar.html.twig
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/nav_bar.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/nav_bar.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayAdminNavBarBeforeEnd'}
```
