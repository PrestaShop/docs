---
Title: displayBackOfficeHeader
hidden: true
hookTitle: 'Administration panel header'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Hook.php'
        file: classes/Hook.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/Layout/head_tag.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/Layout/head_tag.html.twig
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/head_tag.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Component/LegacyLayout/head_tag.html.twig
locations:
    - 'back office'
type: display
hookAliases:
    - backOfficeHeader
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed in the header of the admin panel'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displaybackOfficeHeader')
```
