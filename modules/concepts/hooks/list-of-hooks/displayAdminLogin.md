---
Title: displayAdminLogin
hidden: true
hookTitle: ''
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Hook.php'
        file: classes/Hook.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Layout/login_layout.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Layout/login_layout.html.twig
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
'displayAdminLogin',
        ]);

        if ($useCache && Cache::isStored($cache_id)) {
            return Cache::retrieve($cache_id);
        }
```
