---
menuTitle: filterManufacturerContent
Title: filterManufacturerContent
hidden: true
hookTitle: 'Filter the content page manufacturer'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/listing/ManufacturerController.php'
        file: controllers/front/listing/ManufacturerController.php
locations:
    - 'front office'
type: null
hookAliases: null
array_return: false
check_exceptions: false
chain: true
origin: core
description: 'This hook is called just before fetching content page manufacturer'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'filterManufacturerContent',
            ['filtered_content' => $manufacturerVar['description']],
            $id_module = null,
            $array_return = false,
            $check_exceptions = true,
            $use_push = false,
            $id_shop = null,
            $chain = true
        )
```
