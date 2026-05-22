---
Title: actionGetProductPropertiesAfter
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Hook.php'
        file: classes/Hook.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: action
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
'actionGetProductPropertiesAfter' => ['from' => '1.7.8.0'],
    ];

    public const MODULE_LIST_BY_HOOK_KEY = 'hook_module_exec_list_';

    public function add($autodate = true, $null_values = false)
```
