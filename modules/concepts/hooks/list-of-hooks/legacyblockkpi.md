---
Title: legacyblockkpi
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Admin/LegacyBlockHelperSubscriber.php'
        file: src/Adapter/Admin/LegacyBlockHelperSubscriber.php
locations:
    - 'back office'
type: null
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
{{ renderhook('legacy_block_kpi', {'kpi_controller': 'AdminProductsController'}) }}
```
