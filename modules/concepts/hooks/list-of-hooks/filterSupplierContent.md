---
Title: filterSupplierContent
hidden: true
hookTitle: 'Filter the content page supplier'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/listing/SupplierController.php'
        file: controllers/front/listing/SupplierController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: true
chain: true
origin: core
description: 'This hook is called just before fetching content page supplier'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
'filterSupplierContent',
            ['object' => $supplierVar],
            null,
            false,
            true,
            false,
```
