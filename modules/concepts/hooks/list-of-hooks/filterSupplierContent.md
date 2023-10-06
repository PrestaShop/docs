---
menuTitle: filterSupplierContent
Title: filterSupplierContent
hidden: true
hookTitle: 'Filter the content page supplier'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/listing/SupplierController.php'
        file: controllers/front/listing/SupplierController.php
locations:
    - 'front office'
type: null
hookAliases: null
array_return: false
check_exceptions: false
chain: true
origin: core
description: 'This hook is called just before fetching content page supplier'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'filterSupplierContent',
            ['object' => $supplierVar],
            $id_module = null,
            $array_return = false,
            $check_exceptions = true,
            $use_push = false,
            $id_shop = null,
            $chain = true
        )
```
