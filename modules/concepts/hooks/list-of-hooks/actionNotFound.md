---
Title: actionNotFound
hidden: true
hookTitle: 'Action when a page is not found'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/controllers/front/PageNotFoundController.php'
        file: controllers/front/PageNotFoundController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/controllers/front/ProductController.php'
        file: controllers/front/ProductController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/controllers/front/listing/CategoryController.php'
        file: controllers/front/listing/CategoryController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allows modules to react when a page is not found - log it, redirect or perform other actions.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionNotFound');
```
