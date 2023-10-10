---
menuTitle: filterCmsCategoryContent
Title: filterCmsCategoryContent
hidden: true
hookTitle: 'Filter the content page category'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/CmsController.php'
        file: controllers/front/CmsController.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: false
check_exceptions: false
chain: true
origin: core
description: 'This hook is called just before fetching content page category'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                'filterCmsCategoryContent',
                ['object' => $cmsCategoryVar],
                $id_module = null,
                $array_return = false,
                $check_exceptions = true,
                $use_push = false,
                $id_shop = null,
                $chain = true
            )
```
