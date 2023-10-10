---
Title: filterProductContent
hidden: true
hookTitle: 'Filter the content page product'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/ProductController.php'
        file: controllers/front/ProductController.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: false
check_exceptions: false
chain: true
origin: core
description: 'This hook is called just before fetching content page product'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                'filterProductContent',
                ['object' => $product_for_template],
                null,
                false,
                true,
                false,
                null,
                true
            )
```
