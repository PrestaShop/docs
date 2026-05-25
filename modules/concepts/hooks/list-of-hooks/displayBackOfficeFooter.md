---
Title: displayBackOfficeFooter
hidden: true
hookTitle: 'Administration panel footer'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/default/template/footer.tpl'
        file: admin-dev/themes/default/template/footer.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/admin-dev/themes/new-theme/template/footer.tpl'
        file: admin-dev/themes/new-theme/template/footer.tpl
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Hook.php'
        file: classes/Hook.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/Layout/footer.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/Layout/footer.html.twig
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Layout/legacy_layout.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Layout/legacy_layout.html.twig
locations:
    - 'back office'
type: display
hookAliases:
    - backOfficeFooter 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed within the admin panel''s footer'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h="displayBackOfficeFooter"}
```
