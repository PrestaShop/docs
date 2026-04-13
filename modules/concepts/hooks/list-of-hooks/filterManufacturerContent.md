---
Title: filterManufacturerContent
hidden: true
hookTitle: 'Filter the content page manufacturer'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/front/listing/ManufacturerController.php'
        file: controllers/front/listing/ManufacturerController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: $array_return = false
check_exceptions: $check_exceptions = true
chain: $chain = true
origin: core
description: 'This hook is called just before fetching content page manufacturer'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                    'filterManufacturerContent',
                    ['object' => $manufacturer],
                    $id_module = null,
                    $array_return = false,
                    $check_exceptions = true,
                    $use_push = false,
                    $id_shop = null,
                    $chain = true
                );
```
